<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model {
    use HasFactory;

    const FIRST_LEVEL = 'FIRST_LEVEL';
    const SECOND_LEVEL = 'SECOND_LEVEL';

    protected $fillable = ['referrer_id', 'referred_id', 'type', 'amount'];

    function referrer(){
        return $this->belongsTo(User::class, 'referrer_id');
    }

    function user(){
        return $this->belongsTo(User::class, 'referred_id');
    }
}
