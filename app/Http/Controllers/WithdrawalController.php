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

}
