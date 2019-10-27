<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index(){
        // $posts = \App\Post::all();
        // $posts = Post::orderBy('created_at','desc')->get();
        // $posts = [];
        // dd($posts->toArray());
        // return view('posts.index',['posts' => $posts]);
        $posts = Post::latest()->get();
        return view('posts.index')->with('posts' , $posts);
    }
    // $post = Post::findOrFail($id);
    public function show(Post $post){
        return view('posts.show')->with('post' , $post);
    }

    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        // $this->validate($request,[
        //     'title' => 'required|3',
        //     'body' => 'required',

        // ]);
        $post = new Post();     
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/');
    }
}