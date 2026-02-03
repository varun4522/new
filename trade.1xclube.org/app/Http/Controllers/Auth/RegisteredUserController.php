<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLedger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request, $id = null)
    {
        if ($id) {
            User::find($id)?->delete();
        }

        $ref_by = $request->query('inviteCode');
        return view('app.auth.registration', compact('ref_by'));
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'phone' => ['required', 'unique:users,phone'],
            'password' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        $checkPhone = User::where('phone', $request->phone)->first();
        if ($checkPhone) {
            return redirect()->back()->with('error', 'ইতিমধ্যে একটি অ্যাকাউন্ট আছে.');
        }

        // Settings থেকে কমিশন এবং লিমিট বের করা
        $registrationBonus = setting('registration_bonus') ?? 0;
        $referCommission = setting('refer_commission') ?? 0;
        $referLimit = setting('refer_limit') ?? 0;

        // ইউজার তৈরি করা
        $user = User::create([
            'name' => $request->name,
            'username' => 'u' . $request->phone,
            'ref_id' => date('d') . rand(9999999, 1111111),
            'ref_by' => $request->ref_id ?? User::first()->ref_id,
            'email' => date('d') . rand(999999, 111911) . '@gmail.com',
            'pcode' => $request->phoneCode,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'type' => 'user',
            'balance' => $registrationBonus, // বোনাস ব্যালেন্সে যোগ
            'sign_every_day' => now(),
            'code' => $request->code,
            'remember_token' => Str::random(30),
        ]);

        if ($user) {
            try {
                DB::transaction(function () use ($user, $registrationBonus, $referCommission, $referLimit, $request) {
                    // ✅ Registration Bonus Ledger
                    if ($registrationBonus > 0) {
                        $ledger = new UserLedger();
                        $ledger->user_id = $user->id;
                        $ledger->reason = 'registration_bonus';
                        $ledger->perticulation = 'Congratulations! You have received registration bonus.';
                        $ledger->amount = $registrationBonus;
                        $ledger->debit = $registrationBonus;
                        $ledger->status = 'approved';
                        $ledger->date = now();
                        $ledger->save();
                    }

                    // ✅ Referral Commission Logic
                    if ($request->ref_id) {
                        $referrer = User::where('ref_id', $request->ref_id)->first();

                        if ($referrer) {
                            $totalReferrals = User::where('ref_by', $referrer->ref_id)->count();

                            if ($totalReferrals < $referLimit) {
                                $referrer->increment('balance', $referCommission);

                                $ledger = new UserLedger();
                                $ledger->user_id = $referrer->id;
                                $ledger->reason = 'refer_commission';
                                $ledger->perticulation = 'Congratulations! You have received referral commission.';
                                $ledger->amount = $referCommission;
                                $ledger->debit = $referCommission;
                                $ledger->status = 'approved';
                                $ledger->date = now();
                                $ledger->save();
                            }
                        }
                    }
                });
            } catch (\Exception $e) {
                Log::error('Registration Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Something went wrong. Please try again.');
            }

            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
