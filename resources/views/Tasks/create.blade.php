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
                <a class="navbar-brand" href="{{ URL::to('Tasks') }}">View all tasks</a>
            </div>
            <ul class="nav navbar-nav">
                <!-- <li><a href="{{ URL::to('Tasks') }}">View All Tasks</a></li> -->
                <li><a href="{{ URL::to('Tasks/create') }}">Create a Task</a></li>
            </ul>
        </nav>

        <div class="content">
            <h1>Create a Task</h1>
            @if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

            <!-- if there are creation errors, they will show here -->
            {{ HTML::ul($errors->all()) }}
            <form action="{{ route('Tasks.store') }}" method="post">
                @csrf
            <label for="category_id">Category:</label>
                  <select name="category_id" id="category_id">
                   @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                   </select>
                <div class="row">
                    <div class="col">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name here..">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Description">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="date">Due date</label>
                        <input type="date" name="date" id="date" class="form-control" placeholder="Due date">
                    </div>
                </div>
                
                <div class="my-2">
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>
