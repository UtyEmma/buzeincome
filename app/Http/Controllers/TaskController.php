<?php

namespace App\Http\Controllers;

use App\Library\FileHandler;
use App\Library\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $tasks = Task::isActive()->isNotExpired()->with(['completion'])->get();

        return view('tasks.user-tasks', [
            'tasks' => $tasks
        ]);
    }

    public function list(Request $request){
        $tasks = Task::when($request->search, function($query, $keyword){
            $query->where('title', "LIKE", "%$keyword%");
        })->when($request->status, function($query, $status){
            $query->where('status', $status);
        })->withCount([ 'completions' ])->paginate();

        return view('tasks.tasks-list', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'status' => "required|in:".Status::ACTIVE.','.Status::SUSPENDED,
            'link' => 'nullable|url',
            'reward' => 'required|numeric'
        ]);

        $image = $request->hasFile('image') ? FileHandler::upload($request->file('image')) : null;

        Task::create(collect($validated)->merge([
            'starts_at' => now(),
            'expires_at' => now()->addDay(),
            'duration' => 1,
            'image' => $image
        ])->toArray());

        Alert::success('Task Created Successfully!');

        return back()->with([
            'success' => 'Task Created Successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) {
        $details = $task->with(['completions.user'])->first();
        
        return view('tasks.task-details', [
            'task' => $details
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image'
        ]);

        $image = $request->hasFile('image') ? FileHandler::upload($request->file('image')) : null;

        $task->update(collect($validated)->merge([
            'image' => $image
        ])->toArray());

        Alert::success('Task Updated Successfully!');

        return back()->with([
            'success' => 'Task Updated Successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        
        Alert::success('Task Deleted Successfully!');

        return back()->with('success', 'Task Deleted Successfully!');
    }
}
