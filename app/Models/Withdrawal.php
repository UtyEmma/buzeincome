<?php

namespace App\Models;

use App\Library\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['wallet_id', 'user_id', 'amount', 'status', 'reference'];

    protected $attributes = [
        'status' => Status::NEW
    ];

}
