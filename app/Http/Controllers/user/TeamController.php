<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Mining;
use App\Models\Purchase;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    //
    public function team()
    {
        //First Level
        $first_level_users = User::where('ref_by', auth()->user()->ref_id)->get();

        //Get Second Level
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Get Third Level
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();

        //Get Team Size
        $team_size = $first_level_users->count() + $second_level_users->count() + $third_level_users->count();

        //Get level wise user ids
        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third

        $totalDeposit = Deposit::whereIn('user_id', array_merge($first_ids->toArray(), $second_ids->toArray(), $third_ids->toArray()))->where('status', 'approved')->sum('amount');
        $totalWithdraw = Withdrawal::whereIn('user_id', array_merge($first_ids->toArray(), $second_ids->toArray(), $third_ids->toArray()))->where('status', 'approved')->sum('amount');

        $totalDeposit1 = Deposit::whereIn('user_id', array_merge($first_ids->toArray()))->where('status', 'approved')->sum('amount');
        $totalDeposit2 = Deposit::whereIn('user_id', array_merge($second_ids->toArray()))->where('status', 'approved')->sum('amount');
        $totalDeposit3 = Deposit::whereIn('user_id', array_merge($third_ids->toArray()))->where('status', 'approved')->sum('amount');

        $totalWithdraw1 = Withdrawal::whereIn('user_id', array_merge($first_ids->toArray()))->where('status', 'approved')->sum('amount');
        $totalWithdraw2 = Withdrawal::whereIn('user_id', array_merge($second_ids->toArray()))->where('status', 'approved')->sum('amount');
        $totalWithdraw3 = Withdrawal::whereIn('user_id', array_merge($third_ids->toArray()))->where('status', 'approved')->sum('amount');

        $purchase1 = Purchase::whereIn('user_id', $first_ids->toArray())->groupBy('user_id')->count();
        $purchase2 = Purchase::whereIn('user_id', $second_ids->toArray())->groupBy('user_id')->count();
        $purchase3 = Purchase::whereIn('user_id', $third_ids->toArray())->groupBy('user_id')->count();

        $totalCommission1 = UserLedger::where('user_id', Auth::id())->where('reason', 'commission')->where('step', 'first')->sum('amount');
        $totalCommission2 = UserLedger::where('user_id', Auth::id())->where('reason', 'commission')->where('step', 'second')->sum('amount');
        $totalCommission3 = UserLedger::where('user_id', Auth::id())->where('reason', 'commission')->where('step', 'third')->sum('amount');
        $totalCommission = $totalCommission1 + $totalCommission2 + $totalCommission3;

        return view('app.main.team.index',
            compact(
                'first_level_users',
                'second_level_users',
                'third_level_users',
                'team_size',
                'first_ids',
                'second_ids',
                'third_ids',
                'totalDeposit',
                'totalWithdraw',
                'totalCommission1',
                'totalCommission2',
                'totalCommission3',
                'totalCommission',
                'totalDeposit1',
                'totalDeposit2',
                'totalDeposit3',
                'totalWithdraw1',
                'totalWithdraw2',
                'totalWithdraw3',
                'purchase1',
                'purchase2',
                'purchase3',
            ));
    }


    public function team_result()
    {
        //First Level
        $first_level_users = User::where('ref_by', auth()->user()->ref_id)->get();


        //Get Second Level
        $second_level_users_ids = [];
        foreach ($first_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($second_level_users_ids, $user->id);
            }
        }
        $second_level_users = User::whereIn('id', $second_level_users_ids)->get();

        //Get Third Level
        $third_level_users_ids = [];
        foreach ($second_level_users as $element) {
            $users = User::where('ref_by', $element->ref_id)->get();
            foreach ($users as $user){
                array_push($third_level_users_ids, $user->id);
            }
        }
        $third_level_users = User::whereIn('id', $third_level_users_ids)->get();

        //Get Team Size
        $team_size = $first_level_users->count() + $first_level_users->count() + $third_level_users->count();

        //Get level wise user ids
        $first_ids = $first_level_users->pluck('id'); //first
        $second_ids = $second_level_users->pluck('id'); //Second
        $third_ids = $third_level_users->pluck('id'); //Third

        $users = User::whereIn('id', array_merge($first_ids->toArray(), $second_ids->toArray(), $third_ids->toArray()))->get();

        return  view('app.main.team.list', compact('users'));
    }
}
