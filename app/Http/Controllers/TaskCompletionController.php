<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskCompletion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TaskCompletionController extends Controller
{
    
    function store(Request $request, Task $task) {
        $user = auth()->user();

        if(now()->greaterThan($task->expires_at)) {
            Alert::error('The Task has expired!');

            return back()->with([
                'error' => "The Task has expired!"
            ]);
        }

        TaskCompletion::create([
            'user_id' => $user->id,
            'task_id' => $task->id
        ]);

        Alert::success('Task Marked as Completed!');

        return back()->with([
            'success' => "Task Marked as Completed!"
        ]);
    }

    function verify(Request $request, Task $task, TaskCompletion $taskCompletion) {        
        $taskCompletion->verified_at = now();
        $taskCompletion->save();

        $wallet = $taskCompletion->user->wallet;
        
        $wallet->main_bal += $task->reward;
        $wallet->save();


        Alert::success('Task Completion has been verified Successfully!');

        return back()->with([
            'success' => "Task Completion has been verified Successfully!"
        ]);
    }

    

}
