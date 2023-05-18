<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'escrow_bal', 'main_bal'];

    protected static function booted(){
        // static::updated(function(Wallet $wallet){
        //     $wallet->total_bal = $wallet->main_bal + $wallet->ref_bal;
        // });
    }

    
}
