<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('Tasks',TasksController::class);
    Route::resource('categories',CategoryController::class);
    // Route::get('/user/tasks', 'TasksController@getUserTasks')->name('user.tasks');
    // Route::get('Tasks', 'TasksController@getUserTasks')->name('Tasks.getUserTasks');


});

// Route::post('/delete/{id}','App\Http\Controllers\AdminController@destroyProduct');



require __DIR__.'/auth.php';
