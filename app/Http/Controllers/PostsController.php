<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts)
    {
//        dd($posts);
        $posts = $posts->all();
//        $posts = (new \App\Repositories\Posts)->all();

//        $posts = Post::latest()
//            ->filter(request(['month', 'year']))
//            ->get();

        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();

//        $posts = Post::latest()->get();

//        $posts = Post::latest();
//
//        if ($month = request('month')) {
//            $posts->whereMonth('created_at', Carbon::parse($month)->month);
//        }
//
//        if ($year = request('year')) {
//            $posts->whereYear('created_at', $year);
//        }
//
//        $posts = $posts->get();

        // Temporary
//        $archives = Post::selectRaw('year(created_at) as year,monthname(created_at) as month,count(*) published')
//            ->groupBy('year','month')
//            ->orderByRaw('min(created_at) desc')
//            ->get()
//            ->toArray();
//
//        return view('posts.index', compact('posts', 'archives'));


//        return view('posts.index')->with('posts', $posts);

        return view('posts.index', compact('posts'));
    }

//    public function show($id)
//    {
//        $post = Post::find($id);
//
//        return view('posts.show', compact('post'));
//    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
//        dd(request()->all());
//        dd(request('title'));
//        dd(request(['title', 'body']));

        // Create a new post using the request data
        // $post = new \App\Post;
//        $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');

        // Save it to the database
        // $post->save();

        // validation
        $this->validate(request(), [
            'title' => 'required|max:10',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

//        Post::create(request(['title', 'body', 'user_id']));

//        Post::create([
////            'title' => request('title'),
////            'body' => request('body'),
////            'user_id' => auth()->id()
//////            'user_id' => auth()->user()->id
////        ]);

        // And then redirect to the home page
        return redirect('/');

    }
}
