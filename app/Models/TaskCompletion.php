<?php

namespace App\Models;

use App\Library\Status;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCompletion extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = ['user_id', 'task_id'];

    function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    function task(){
        return $this->hasOne(Task::class, 'id');
    }

}
