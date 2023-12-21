<x-app-layout>
<!DOCTYPE html>
<html>
<head>
<title>CREATE TASK</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="sm:flex sm:items-center sm:ms-6 ml-auto">
<!-- <div class="d-flex justify-content-end"> -->
    <x-dropdown align="left" width="100">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border 
                        border-transparent text-l leading-4 font-large rounded-md 
                        text-gray-500 bg-white hover:text-gray-700 focus:outline-none 
                        transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
<div class="container">
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('Tasks') }}">View all tasks</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Tasks/create') }}">Create a Task</a>
    </ul>
</nav>

<a class="btn btn-small btn-info" href="{{ URL::to('categories') }}">View Categories</a>
<a class="btn btn-small btn-info" href="{{ URL::to('Tasks') }}">View Tasks</a>
<a class="btn btn-small btn-info" href="{{ URL::to('Tasks/show') }}">Check Your Tasks</a>
<h1>All the Tasks</h1>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Description</td>
            <td>Due Date</td>
            <td>Category</td>
            <td>Assigned To</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->date }}</td>
            <td>
                @if($task->category_id)
                        {{ $task->category->name }}
                @else
                    No Category
                @endif
            </td>
            <td>
            @if($task->user_id)
            {{$task->user->name}}
            @else
                    Not specified
                @endif
        </td>
            <td>
                <form method="POST" action="{{ route('Tasks.destroy', $task->id) }}" style="display: inline;">
                  @csrf
                 @method('DELETE')
              <button type="submit" class="btn btn-small btn-danger" 
              onclick="return confirm('Are you sure you want to delete this task?')">Delete this task</button>
                </form>
                 <script>
                            window.onload = function() {
                        if (window.history.replaceState) {
                              window.history.replaceState(null, null, window.location.href);
                              }
                                   }                                  
                                    </script>
                <a class="btn btn-small btn-success" href="{{ URL::to('Tasks/' . $task->id) }}">Show this task</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('Tasks/' . $task->id . '/edit') }}">Edit this task</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
 </body>
</html>
</x-app-layout>
