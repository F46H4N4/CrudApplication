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
                <a class="navbar-brand" href="{{ url('categories') }}">View all Categories</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ url('categories/create') }}">Create a Category</a></li>
            </ul>
        </nav>

        <div class="content">
            <h1>Create a Task</h1>
            @if (session('message'))
                <div class="alert alert-info">{{ session('message') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <input type="text" name="name" placeholder="Category Name">
                <button type="submit">Create Category</button>
            </form>
        </div>
    </div>
</body>
</html>
