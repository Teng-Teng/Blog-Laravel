<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsAlbumController extends Controller
{
    public function index()
    {
        return view('postsAlbum.index');
    }

    public function show()
    {
        return view('postsAlbum.show');
    }
}
