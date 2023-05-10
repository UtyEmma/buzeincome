<?php

namespace App\Models;

use App\Library\Roles;
use App\Library\Status;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $fillable = [ 'firstname', 'lastname', 'email', 'password', 'phone', 'socials', 'referral_id', 'role', 'status', 'image'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'status' => Status::ACTIVE
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'socials' => 'array',
    ];

    protected static function booted(): void
    {
        static::created(function (User $user) {
            $user->wallet()->create([
                'user_id' => $user->id,
                'main_bal' => env('DEFAULT_BALANCE')
            ]);
        });
    }

    // Scopes

    public function scopeIsActive(Builder $query){
        $query->where('status', Status::ACTIVE);
    }

    public function scopeIsAUser(Builder $query){
        $query->where('role', Roles::USER);
    }
    
    public function scopeIsAnAdmin(Builder $query){
        $query->where('role', Roles::ADMIN);
    }

    public function scopeIsAllAdmins(Builder $query){
        $query->where('role', Roles::ADMIN)->orWhere('role', Roles::SUPERADMIN);
    }

    public function scopeIsASuperAdmin(Builder $query){
        $query->where('role', Roles::SUPERADMIN);
    }

    public function scopeIsAVendor(Builder $query){
        $query->where('role', Roles::VENDOR);
    }

    // Relationships
    function coupon(){
        return $this->hasOne(Coupon::class, 'user_id');
    }

    function referrer(){
        return $this->hasOne(User::class, 'referrer_id');
    }

    function wallet(){
        return $this->hasOne(Wallet::class, 'user_id');
    }

    function coupons(){
        return $this->hasMany(Coupon::class, 'vendor_id');
    }

    function users(){
        return $this->hasManyThrough(Coupon::class, User::class, 'coupon_id', 'vendor_id', 'id', 'id' );
    }

    function vendor(){
        return $this->hasOneThrough(User::class, Coupon::class, 'vendor_id', 'coupon_id', 'id', 'id' );
    }

    // Utilities
    public function isUser(User $user =  null){
        return ($user ?? auth()->user())->role === Roles::USER;
    }

    public function isAdmin(User $user =  null){
        return ($user ?? auth()->user())->role === Roles::ADMIN;
    }

    public function isSuperAdmin(User $user =  null){
        return ($user ?? auth()->user())->role === Roles::SUPERADMIN;
    }

    public function isAnyAdmin(User $user =  null){
        return ($user ?? auth()->user())->role === Roles::ADMIN || ($user ?? auth()->user())->role === Roles::SUPERADMIN;
    }
    
    public function isVendor(User $user =  null){
        return ($user ?? auth()->user())->role === Roles::VENDOR;
    }
}
