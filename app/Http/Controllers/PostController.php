<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post', ['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        // dd($post);
        return view('detail', ['post' => $post]);
    }
}
