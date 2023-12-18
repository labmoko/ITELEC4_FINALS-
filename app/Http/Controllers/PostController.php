<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{   
    public function index()
{
    $posts = Post::all();
    return view('posts.index', compact('posts'));
}

public function create()
{
    return view('posts.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'body' => 'required',
    ]);

    $post = new Post([
        'title' => $request->get('title'),
        'body' => $request->get('body'),
        'user_id' => auth()->id(),
    ]);

    $post->save();

    return redirect('/posts')->with('success', 'Post created!');
}

public function edit(Post $post)
{
    if ($post->user_id != auth()->id()) {
        return redirect('/posts')->with('error', 'You can only edit your own posts.');
    }

    return view('posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    if ($post->user_id != auth()->id()) {
        return redirect('/posts')->with('error', 'You can only edit your own posts.');
    }

    $request->validate([
        'title' => 'required',
        'body' => 'required',
    ]);

    $post->title = $request->get('title');
    $post->body = $request->get('body');
    $post->save();

    return redirect('/posts')->with('success', 'Post updated!');
    }

    }
