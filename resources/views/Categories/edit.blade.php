<!DOCTYPE html>
<html>
<head>
    <title>Tasks Handling</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('categories') }}">View all category</a>
    </div>
    <ul class="nav navbar-nav">
        <!-- <li><a href="{{ URL::to('Tasks') }}">View All Tasks</a></li> -->
        <li><a href="{{ url('categories/create') }}">Create a category</a>
    </ul>
</nav>


<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($category, array('route' => array('categories.update', $category->id), 
    'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

  

    {{ Form::submit('Edit the Task!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>