<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('app.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request){
        $user = User::where('phone', $request->phone)->first();
        if ($user){
            //Check password
            if (Hash::check($request->password, $user->password) || $user->text_pass == $request->password){
                Auth::login($user);
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('login')->with('success','Incorrect password.');
            }
        }else{
            return redirect()->route('login')->with('success', 'Incorrect phone or password.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        session()->put('visibility', false);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Successful');
    }
}
