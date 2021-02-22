<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class ApiController extends Controller
{
    public function index(){
        $posts = Post::with(['info', 'comments', 'tags'])->get();
        return response()->json($posts);
    }
    
}
