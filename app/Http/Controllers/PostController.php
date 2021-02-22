<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\InfoPost;
use App\Tag;
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
        $tags = Tag::all();
        return view('create_post', ['tags' => $tags]);
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

        if(!empty($data['tags'])){
            $post->tags()->attach($data['tags']);
        }
        
        return redirect()->route('post')
            ->with('message', 'il post dal titolo "'.$post->title.'" è stato creato correttamente');

    }

    public function edit($slug){
        $post = Post::where('slug', $slug)->first();
        $tags = Tag::all();
        return view('edit', ['post' => $post, 'tags' => $tags]);
    }

    public function update(Request $request, $slug){
        // dd($request->all());
        $request->validate($this->validation);
        $data = $request->all();
        $post = Post::where('slug', $slug)->first();
        if(empty($post)){
            return redirect()->route('post')->with('messageError', "Il file che stai modificando non esiste più, una volta modificato un file non tornare indietro ma modificalo un'altra volta dall'indice");
        }
        $post->fill($data);
        $post->slug = Str::slug($data['title'], '-');
        // dd($post);
        $post->save();

        $infoPost = InfoPost::where('post_id', $post->id)->first();
        $infoPost->fill($data);
        $infoPost->save();
        // dd($infoPost);

        if(empty($data['tags'])){
            $post->tags()->detach();
        }
        else{
            $post->tags()->sync($data['tags']);
        }
        
        return redirect()->route('detail', $post->slug)
            ->with('message', 'il post dal titolo "'.$post->title.'" è stato modificato correttamente');
    }

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post')
            ->with('message', 'Il post dal titolo "'.$post->title.'" è stato eliminato correttamente');
    }
}
