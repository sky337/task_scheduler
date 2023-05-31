<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskboardController extends Controller
{
    public function index()
    {
        $todo=Task::where('status','PENDING')->get();
        $inprogress=Task::where('status','IN_PROGRESS')->get();
        $completed=Task::where('status','COMPLETED')->get();
        // dd($todo);
        // $important=Task::where('status','PENDING')->get();

        // dd($tasks);
        return view('to_do_tasks.index',compact('todo','inprogress','completed'));
    }


    public function updateStatus(Request $request)
{

    // dd($request->all());
    $taskId = $request->input('taskId');
    $status = $request->input('status');

   
    // Update the task status in the database
    $task = Task::find($taskId);
    $task->status = $status;
    $task->save();

    // Return a response if needed
    return response()->json(['message' => 'Task status updated']);
}

    // public function index()
    // {
    //     $tasks = Task::orderBy('created_at', 'asc')->get();

    //     return view('taskboard', compact('tasks'));
    // }
}
