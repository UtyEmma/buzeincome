<?php

namespace App\Http\Controllers;

use App\Library\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Alert;
use App\Services\CouponService;

class VendorController extends Controller
{
    
    function list(){
        $query = User::query();

        $vendors = $query->isAVendor()->get();

        return view('vendors', [
            'vendors' => $vendors
        ]);
    }

    function store(Request $request, CouponService $couponService){

        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric'],
            'password' => ['required',  Password::defaults()],
        ]);

        $user = User::create(collect($validated)->merge([
            'password' => Hash::make($request->password),
            'role' => Roles::VENDOR,
            'email_verified_at' => now()
        ])->toArray());

        $couponService->createCoupons($user, 10);
        // Send Email TO Vendor About Account Creation

        Alert::success('Vendor Account Created Successfully!');

        return back();
    }

    function destroy(Request $request){

    }

}
