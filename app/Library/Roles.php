<?php 

namespace App\Library;

use App\Models\User;

class Roles {

    const SUPERADMIN = 'super-admin';
    const ADMIN = 'admin';
    const USER = 'user';
    const VENDOR = 'vendor';

    public function isUser(User $user){
        return ($user ?? auth()->user())->role === Roles::USER;
    }

    public function isAdmin(User $user){
        return ($user ?? auth()->user())->role === Roles::ADMIN;
    }

    public function isSuperAdmin(User $user){
        return ($user ?? auth()->user())->role === Roles::SUPERADMIN;
    }

    public function isAnyAdmin(User $user){
        return ($user ?? auth()->user())->role === Roles::ADMIN || ($user ?? auth()->user())->role === Roles::SUPERADMIN;
    }
    
    public function isVendor(User $user){
        return ($user ?? auth()->user())->role === Roles::VENDOR;
    }



}