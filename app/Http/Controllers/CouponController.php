<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function verifyCoupon()
    {
        return view('coupon.verify-coupon');
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
