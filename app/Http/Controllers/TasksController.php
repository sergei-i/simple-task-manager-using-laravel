<?php

namespace App\Http\Controllers;

use App\Http\Requests\createTaskRequest;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(createTaskRequest $request)
    {
        Task::create($request->all());

        return redirect()->route('tasks.index');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => [
                'required',
                Rule::unique('tasks')->ignore($id)
            ],
            'description' => 'required'
        ]);

        $task = Task::find($id);
        $task->fill($request->all());
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }

    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect()->route('tasks.index');
    }
}
