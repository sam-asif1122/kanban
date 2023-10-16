@extends('layouts.app')

@section('content')
    <h1>Projects</h1>
    <a href="{{ route('project.create') }}" class="btn btn-primary">Create Project</a>
    <table class="table-auto">
  <thead>
    <tr>
      <th class="px-4 py-2">Title</th>
      <th class="px-4 py-2">Author</th>
      <th class="px-4 py-2">Views</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($projects as $project)
            <tr>
                <td class="border px-4 py-2">{{ $project->name }}</td>
                <td><a href="{{ route('project.edit', $project) }}">Edit</a></td>
                <td> <form action="{{ route('project.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                </form>                </td>
</tr>
        @endforeach
  </tbody>
    </table>
    
@endsection