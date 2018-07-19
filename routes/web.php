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

App::bind('App\Billing\Stripe', function () {
    return new \App\Billing\Stripe(config('services.stripe.secret'));
});

$stripe = App::make('App\Billing\Stripe');
//$stripe = resolve('App\Billing\Stripe');
//$stripe = app('App\Billing\Stripe');

dd($stripe);


Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


Route::get('/postsAlbum', 'PostsAlbumController@index');
Route::get('/postsAlbum/{post}', 'PostsAlbumController@show');


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
