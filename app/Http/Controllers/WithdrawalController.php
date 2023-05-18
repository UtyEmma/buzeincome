<?php

namespace App\Http\Controllers;

use App\Library\Status;
use App\Library\Token;
use App\Models\AppSettings;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WithdrawalController extends Controller {


    function store(Request $request) {
        $user = $request->user();

        $settings = AppSettings::first();

        $wallet = $user->wallet;

        $request->validate([    
            'type' => 'required|in:main_bal,ref_bal',
            'amount' => ['required', 'numeric']
        ]);

        if($request->type === 'main_bal') {
            if($wallet->main_bal < $settings->limit) {
                Alert::error("Main balance must be up to $$settings->limit to withdraw!");
                return back();
            } 
        }

        if($request->type === 'ref_bal') {
            if($wallet->ref_bal < $settings->ref_limit) {
                Alert::error("Referral balance must be up to $$settings->ref_limit to withdraw!");
                return back();
            }
        }

        if($wallet[$request->type] < $request->amount) {
            Alert::error('Insufficient Funds!');
        
            return back()->withErrors([
                'amount' => 'Insufficient funds!'
            ]);
        }

        $reference = Token::random('withdrawals', 'reference');
        
        Withdrawal::create([
            'amount' => $request->amount,
            'wallet_id' => $wallet->id,
            'user_id' => $user->id,
            'reference' => $reference,
            'type' => $request->type
        ]);

        $wallet[$request->type] -= $request->amount;
        $wallet->escrow_bal += $request->amount;
        $wallet->save();

        Alert::success("Withdrawal Intitiated Successfully!");

        // Send Withdrawal initiated notification
        
        return back();
    }

    function list(Request $request){
        $withdrawals = Withdrawal::with(['user'])->paginate();

        return view('withdrawals.list', [
            'withdrawals' => $withdrawals
        ]);
    }

    function update(Request $request, Withdrawal $withdrawal, $status) {
        if($status !== Status::DENIED && $status !== Status::COMPLETED) {
            Alert::error("Invalid Withdrawal Status"); 
            return back();
        }

        $withdrawal->status = $status;
        $withdrawal->save();

        $wallet = $withdrawal->user->wallet;

        if($status === Status::DENIED){
            $wallet[$withdrawal->type] += $withdrawal->amount;
        }

        $wallet->escrow_bal -= $withdrawal->amount;
        $wallet->save();

        // Send Notification
        Alert::success("Withdrawal $status!");

        return back();
    }

    function destroy(Withdrawal $withdrawal){
        $withdrawal->delete();
        Alert::success('Withdrawal Deleted Successfully!');
        return back();
    }
}
