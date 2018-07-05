<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Task;

Route::get('/', 'PostsController@index');

Route::get('/tasks', 'TasksController@index');
Route::get('tasks/{task}', 'TasksController@show');

//Route::get('/tasks', function () {
//
////    $tasks = DB::table('tasks')->latest()->get();
//
//    $tasks = Task::all();
//    return view('tasks.index', compact('tasks'));
//});


//Route::get('/tasks/{id}', function ($id) {
//
////    $task = DB::table('tasks')->find($id);
//
//    $task = Task::find($id);
//    return view('tasks.show', compact('task'));
//});


Route::get('/welcome', function() {
    $tasks = [
        'jack',
        'teng',
        'rose'
    ];

    return view('welcome', compact('tasks'));
});

Route::get('/about', function() {
    return view('about');
});