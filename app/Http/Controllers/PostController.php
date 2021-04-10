<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this -> middleware(['auth'])->only(['store', 'destroy']); //dodać edit
    }

    public function index()
    {
        $posts = Post::latest()->with('user', 'likes')->paginate(20);


        return view('posts.index',[
            'posts'=>$posts
            ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

       $request->user()->posts()->create($request->only('body'));

       return back();
    }

    public function destroy(Post $post)
    {
      //  $this->authorize('delete, $post');
        $post->delete();
        return back();
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post'=>$post
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.postEditForm')->with('post', $post);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
          'body' => 'required'
        ]);

        $post->update($request->all());

       // dd($post);
        return redirect()->route('posts');
    }
}