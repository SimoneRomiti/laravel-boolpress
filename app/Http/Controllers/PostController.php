<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\InfoPost;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private $validation = [
        'title' => 'required',
        'author' => 'required',
        'text' => 'required',
    ];
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

    public function create(){
        return view('create_post');
    }

    public function store(Request $request){

        $request->validate($this->validation);
        $data = $request->all();


        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');
        $post->published_at = date('Y-m-d H:i:s');
        $post->save();

        $infoPost = new InfoPost();
        $infoPost->fill($data);
        $infoPost->post_id = $post->id;
        $infoPost->save();

        return redirect()->route('detail', $post->slug)
            ->with('message', 'il post dal titolo "'.$post->title.'" è stato creato correttamente');

    }

    public function edit($slug){
        $post = Post::where('slug', $slug)->first();
        return view('edit', ['post' => $post]);
    }

    public function update(Request $request, $slug){
        // dd($request->all());
        $request->validate($this->validation);
        $data = $request->all();
        $post = Post::where('slug', $slug)->first();
        $post->fill($data);
        // dd($post);
        $post->save();

        $infoPost = InfoPost::where('post_id', $post->id)->first();
        $infoPost->fill($data);
        $infoPost->save();
        // dd($infoPost);
        
        return redirect()->route('detail', $slug)
            ->with('message', 'il post dal titolo "'.$post->title.'" è stato modificato correttamente');
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post')
            ->with('message', 'Il post dal titolo "'.$post->title.'" è stato eliminato correttamente');
    }
}
