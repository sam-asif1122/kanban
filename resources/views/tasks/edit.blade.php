@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Task Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>
        <label for="project_id">Project:</label>
        <select name="project_id">
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Update</button>
    </form>
@endsection