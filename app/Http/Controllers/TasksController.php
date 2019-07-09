<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TasksFormRequest;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    protected $task;

    public function index() 
    {
        return view('tasks.index');
    }

    public function show(Task $task)
    { 
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TasksFormRequest $request)
    {
        Task::create(
            array_merge($request->except('_token'), ["user_id" => Auth::id()])
        );

        return redirect()->route('tasks.index')->with('message', 'Successfully inserted new task.');
    }

    public function edit(Task $task) 
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TasksFormRequest $request, Task $task) 
    {
        $task->update(
            array_merge($request->except(['_token' , '_method']), ["user_id" => Auth::id()])
        );
        return redirect()->route('tasks.index')->with('message', 'Successfully updated item');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('message', 'Successfully deleted requested item.');
    }

}
