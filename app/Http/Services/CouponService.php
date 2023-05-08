<?php

namespace App\Http\Services;

use App\Library\Status;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Support\Str;

class CouponService {

    const ACTIVE = 'ACTIVE';
    const EXPIRED = 'EXPIRED';

    function generateRandomCoupon($len = 10){
        $str = Str::random($len);

        if(Coupon::where('code', $str)->where('status', self::ACTIVE)->exists()){
            return $this->generateRandomCoupon($len);
        }

        return strtoupper($str);
    }

    function createCoupons(User $vendor, $count){
        for ($i=0; $i < $count; $i++) { 
            Coupon::create([
                'code' => $this->generateRandomCoupon(),
                'vendor_id' => $vendor->id
            ]);
        }
    }

    function checkForExistingCoupon($code) : bool{
        return Coupon::where('code', $code)->exists();
    }

    function checkIfCouponIsUsed(Coupon $coupon) : bool {
        return $coupon->status === Status::USED;
    }

}