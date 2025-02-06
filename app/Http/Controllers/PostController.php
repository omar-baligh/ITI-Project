<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:5',
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(), // 
        ]);

        return redirect()->route('posts.index')->with('success', 'Post Created Successfully!');
    }

    public function edit(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized Access');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized Access');
        }

        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'required|min:5',
        ]);

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully!');
    }

    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'Unauthorized Access');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully!');
    }
}
