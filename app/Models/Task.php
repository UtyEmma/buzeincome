<?php

namespace App\Models;

use App\Library\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['title', 'description', 'image', 'duration', 'starts_at', 'expires_at', 'status'];

    protected $attribute = [
        'status' => Status::ACTIVE
    ];

}
