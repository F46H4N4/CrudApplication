<!-- 
@extends('layouts.app') <!-- Use your layout template if available -->

<!-- @section('content') --> -->
    <div class="user-profile">
        <h1>User Profile: {{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        <h2>Tasks:</h2>
        <ul>
            @forelse($user->tasks as $task)
                <li>
                    <strong>{{ $task->name }}</strong> - <!-- Task name -->
                    {{ $task->description }} - <!-- Task description -->
                    <em>{{ $task->date }}</em> <!-- Task date -->
                </li>
            @empty
                <li>No tasks found for this user.</li>
            @endforelse
        </ul>
    </div>
<!-- @endsection -->