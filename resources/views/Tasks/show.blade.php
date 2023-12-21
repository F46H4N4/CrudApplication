<!DOCTYPE html>
<html>
<head>
    <title>Task Handling</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('Tasks') }}">View all tasks</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('Tasks/create') }}">Create a Task</a>
    </ul>
</nav>
<!-- @foreach($userTasks as $task)
@if($task->user_id == auth()->user()->id)
<p>{{auth()->user()->name}}</p>
<p>{{auth()->user()->email}}</p>
@endif
@endforeach -->
@if($Task)
    <h1>Showing: {{ $Task->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $Task->name }}</h2>
        <p>
            <strong>Description:</strong> {{ $Task->description }}<br>
            <strong>Due_date:</strong> {{ $Task->date }}<br>
            <strong>Category name:</strong> {{ $Task->category->name }}
        </p>
    </div>
@endif
<h1>Pending Tasks</h1>
@if($userTasks->isNotEmpty())
    @foreach($userTasks as $task)
        @if($task->user_id == auth()->user()->id)
            <p>Task Name: {{ $task->name }}</p>
            <p>Category Name:{{$task->category->name}}
            <!-- Display other task details as needed -->
        @endif
    @endforeach
@else
    <p>No tasks found for this user.</p>
@endif
    </div>
</div>
</body>
</html>