<?php

namespace App\Models;

use App\Library\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['title', 'description', 'image', 'duration', 'starts_at', 'expires_at', 'link', 'status', 'reward'];

    function scopeIsActive($query){
        $query->where('status', Status::ACTIVE);
    }

    function completion(){
        return $this->hasOne(TaskCompletion::class, 'task_id')->where('user_id', auth()->id());
    }

    function completions(){
        return $this->hasMany(TaskCompletion::class, 'task_id');
    }

}

