<?php

namespace App\Http\Controllers;

use App\Library\Status;
use App\Library\Token;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WithdrawalController extends Controller {


    function store(Request $request) {
        $user = $request->user();

        $request->validate([
            'amount' => ['required', 'numeric', 'min:1']
        ]);

        $wallet = $user->wallet;

        if($wallet->main_bal < $request->amount) {
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
            'reference' => $reference
        ]);

        $wallet->main_bal -= $request->amount;
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
            $wallet->main_bal += $withdrawal->amount;
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
