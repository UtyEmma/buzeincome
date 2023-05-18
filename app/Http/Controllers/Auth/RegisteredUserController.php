<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\CouponService;
use App\Http\Services\ReferralService;
use App\Library\Roles;
use App\Library\Status;
use App\Library\Token;
use App\Models\Coupon;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller {

    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request, CouponService $couponService, ReferralService $referralService): RedirectResponse {
        $validated = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',  Rules\Password::defaults()],
            'terms' => 'accepted',
            'coupon_code' => ['required', 'exists:coupons,code'],
            'referral_code' => ['nullable', 'exists:users,referral_id']
        ]);

        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if($couponService->checkIfCouponIsUsed($coupon)) return back()->withErrors([
            'coupon_code' => 'This coupon code has already been used'
        ]);

        $user = User::create(collect($validated)->except(['terms', 'coupon_code'])->merge([
            'password' => Hash::make($request->password),
            'role' => Roles::USER,
            'coupon_id' => $coupon->id,
            'referral_id' => strtoupper(Token::text(8, 'users', 'referral_id')),
        ])->toArray());

        $coupon->status = Status::USED;
        $coupon->user_id = $user->id;
        $coupon->used_at = $user->created_at;
        $coupon->save();

        if($request->filled('referral_code')) {
            $referrer = User::where('referral_id', $request->referral_code)->first();
            $user->referrer_id = $referrer->id;
            $user->save();

            $user->refresh();

            $referralService->handleReferralPayout($user);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
