<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $task = new Task([
            'title' => $request->input('title'),
            'priority' => 0,
        ]);
        $project = Project::find($request->input('project_id'));
        $project->tasks()->save($task);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->input('title'),
            'project_id' => $request->input('project_id'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function updatePriority(Request $request, Task $task)
    {
        $newPriority = $request->input('newPriority');

        $task->priority = $newPriority ;
        $task->save();
        return response()->json(['message' => 'Priority updated successfully']);
    }

    public function tasksByProject(Project $project)
    {
        $tasks = $project->tasks()->orderBy('priority')->get();
        return view('tasks.index', compact('tasks'));
    }
}