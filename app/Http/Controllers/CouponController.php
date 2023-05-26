<?php

namespace App\Http\Controllers;
use App\Models\Coupon;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{

    function __construct(Coupon $coupon)
    {
       $this->coupon = $coupon;
    }

    public function verifyCoupon()
    {
        return view('coupon.verify-coupon');
    }

    public function checkValidity(Request $request)
    {
        $this->validate($request, [
            'couponNumber' => 'required',
        ]);

        $couponNumberValidity = $request->input('couponNumber');

        $checkValidity = Coupon::where([
            ['code', '=', $couponNumberValidity]
            ])->first();

            if($checkValidity){

                Alert::success('Coupon Code is Valid');
                return back();

            }else{
                Alert::error('Coupon Code is Invalid');
                return back();
            }

    }

    public function howItWorks(){
        return view('/how-it-works');
    }

    function privacy(){
      
       return view('/privacy-policy');
    }



    function list(Request $request){
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function contact_us()
    {
        return view('contact');
    }
}
