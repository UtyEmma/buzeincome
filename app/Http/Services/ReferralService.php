<?php

namespace App\Http\Services;

use App\Library\Token;
use App\Models\AppSettings;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReferralService {


    function handleReferralPayout(User $user) : void {
        if(!$user->referrer) return;

        $settings = AppSettings::first();
        $comission = $settings->refferal_comission;

        $firstLevelReferrer = $user->referrer;
        $this->handlePayout($firstLevelReferrer, $comission);

        $this->registerReferral($user, Referral::FIRST_LEVEL, $comission);
        
        $this->sendFirstLevelReferralNotification($firstLevelReferrer, $comission);
        
        if($firstLevelReferrer->referrer){
            $secondLevelReferrer = $firstLevelReferrer->referrer; 
            $second_level_comission = $settings->second_level_refferal_comission;
            
            $this->handlePayout($secondLevelReferrer, $second_level_comission);
            $this->registerReferral($user, Referral::SECOND_LEVEL, $second_level_comission);
            
            $this->sendSecondLevelReferralNotification($secondLevelReferrer, $second_level_comission);
        }
    }
    
    private function registerReferral(User $user, $type, $amount) {
        Referral::create([
            'referrer_id' => $user->referrer_id, 
            'referred_id' => $user->id, 
            'type' => $type, 
            'amount' => $amount
        ]);
    }

    private function handlePayout(User $user, int $comission) : void {
        $wallet = $user->wallet;
        $wallet->ref_bal += $comission;
        $wallet->save();
    }

    private function sendFirstLevelReferralNotification($user, $comission){

    }

    private function sendSecondLevelReferralNotification($user, $comission){

    }

}