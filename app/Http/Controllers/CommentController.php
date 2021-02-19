<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function newComment(Request $request, $id){
        // dd($request->all());

        $post = Post::findOrFail($id);
        $data = $request->all();
        $data['published_at'] = date('Y-m-d H:i:s');
        
        $data['post_id'] = $id;

        $comment = new Comment();
        $comment->fill($data);
        // dd($comment);
        $comment->save();

        return redirect()->route('detail', $post->slug);

    }
}
