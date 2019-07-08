<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskCreateRequest;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    protected $task;

    public function __construct(Task $task) {
        $this->task = $task;
        $this->middleware('auth');
    }

    // List / Show
    public function index() {
        $user = Auth::user();
        $tasks = $this->task->where('user_id', $user->id)->get();
        return view('tasks.index', compact('tasks'));
    }

    // Create 
    public function create() {
        return view('tasks.create');
    }

    public function store(TaskCreateRequest $request) {
        $user = Auth::user();
        $title = $request->title;
        $result = Task::store($title, $user->id);
        if($result){
            return redirect()->route('task_list')->with('msg', 'Successfully created new task.');
        }else {
            return redirect()->route('task_create')->with('error', 'New Task fail to insert!');
        }
    }

    // Edit
    public function edit(Request $request, $id) {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    } 

    // Update 
    public function update(TaskCreateRequest $request) {
        $user = Auth::user();
        $title = $request->title;
        $id = $request->task_id;
        $result = Task::updateTask($title, $id, $user->id);
        if($result){
            return redirect()->route('task_list')->with('msg', 'Successfully updated requested task.');
        }else {
            return redirect()->route('task_edit', $id)->with('error', 'Task fail to update!');
        }
    }

    // Delete
    public function del(Request $request) {
        $task_id = $request->task_id;
        $result = Task::where('id', $task_id)->delete();
        if($result){
            return redirect()->route('task_list')->with('msg', 'Successfully delete the task.');
        }else {
            return redirect()->route('task_list')->with('error', 'Fail to delete task.');
        }
    }
}
