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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'firstname', 'lastname', 'email', 'password', 'phone', 'socials', 'referral_id', 'role', 'status'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'status' => Status::ACTIVE
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'socials' => 'array',
    ];

    public function scopeIsAUser(Builder $query){
        return $query->where('role', Roles::USER);
    }
    
    public function scopeIsAnAdmin(Builder $query){
        return $query->where('role', Roles::ADMIN);
    }

    public function scopeIsAllAdmins(Builder $query){
        return $query->where('role', Roles::ADMIN)->orWhere('role', Roles::SUPERADMIN);
    }

    public function scopeIsASuperAdmin(Builder $query){
        return $query->where('role', Roles::SUPERADMIN);
    }

    public function scopeIsAVendor(Builder $query){
        return $query->where('role', Roles::VENDOR);
    }

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
