<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('Tasks') }}">View all tasks</a>
    </div>
    <ul class="nav navbar-nav">
        <!-- <li><a href="{{ URL::to('Tasks') }}">View All Tasks</a></li> -->
        <li><a href="{{ URL::to('Tasks/create') }}">Create a Task</a>
    </ul>
</nav>


<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($Task, array('route' => array('Tasks.update', $Task->id), 'method' => 'PUT')) }}
<div class="form-group">
    {{ Form::label('category_id', 'Category') }}
    <select name="category_id" class="form-control">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $Task->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('date', 'Due date') }}
        {{ Form::date('date', $Task->date, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Task!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>