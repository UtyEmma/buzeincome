<?php

namespace App\Models;

use App\Library\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['code', 'vendor_id', 'user_id'];

    protected $attributes = [
        'status' => Status::UNUSED
    ];

    function vendor(){
        return $this->belongsTo(User::class, 'vendor_id');
    }

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
