<?php

namespace App\Http\Controllers;

use App\Http\Services\CouponService;
use App\Library\Roles;
use App\Library\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class VendorController extends Controller
{

    function index(){
        $vendors = User::isAVendor()->isActive()->paginate();

        return view('vendors.indexVendor', [
            'vendors' => $vendors
        ]);
    }
    
    function list(){
        $query = User::query();

        $vendors = $query->isAVendor()
                            ->with(['coupons'])
                            ->withCount(['coupons as active_coupons_count' => function($query){
                                return $query->where('status', Status::UNUSED);
                            }])
                            ->withCount(['coupons'])
                            ->get();

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
            'status' => ['required', "in:".Status::ACTIVE.','.Status::BANNED.','.Status::SUSPENDED]
        ]);

        // $password = Str::password();
        $password = "1234567890";

        $user = User::create(collect($validated)->merge([
            'password' => Hash::make($password),
            'role' => Roles::VENDOR,
        ])->toArray());

        $user->email_verified_at = now();
        $user->save();

        $couponService->createCoupons($user, 10);

        // Send Email TO Vendor About Account Creation with login details

        Alert::success('Vendor Account Created Successfully!');

        return back();
    }

    function coupons(Request $request) {
        $coupons = $request->user()
                            ->coupons()
                            ->where('status', Status::UNUSED)
                            ->with(['vendor'])
                            ->get();
                            
        return view('vendors.vendor-coupons', [
            'coupons' => $coupons
        ]);
    }
                        
    function couponHistory(Request $request){
        $coupons = $request->user()
                        ->coupons()
                        ->when($request->search, function($query, $keyword) {
                            $query->where('code', 'LIKE', "%$keyword%")
                                    ->orWhereRelation('user', 'firstname', 'LIKE', "%$keyword%")
                                    ->orWhereRelation('user', 'lastname', 'LIKE', "%$keyword%");
                        })
                        ->where('status', Status::USED)
                        ->with(['user'])
                        ->paginate();

        return view('vendors.vendor-coupon-history', [
            'coupons' => $coupons
        ]);
    }

    function destroy(Request $request, User $user){
        if(!$user) {
            Alert::error('The User was not found!'); 
            return back();
        }

        $user->delete();

        Alert::success('The User Account was deleted Successfully!');
        
        return back();
    }

}
