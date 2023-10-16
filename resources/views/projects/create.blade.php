@extends('layouts.app')

@section('content')
    <h1>Create Project</h1>
    <form action="{{ route('project.store') }}" method="POST" class="w-full max-w-sm">
        @csrf
        <div class="md:flex md:items-center mb-6">

        <div class="md:w-1/3">

        <label for="name" class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">Project Name:</label>
        </div>
        <div class="md:w-2/3">

        <input type="text" class =" bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="name" required>
</div>
        </div>
        <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Create</button>
    </form>
@endsection