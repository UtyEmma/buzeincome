<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['user_id', 'bank', 'account_name', 'account_number'];

    protected $with = ['bankInfo'];

    public function bankInfo(){
        return $this->belongsTo(Bank::class, 'bank', 'code');
    }
}
