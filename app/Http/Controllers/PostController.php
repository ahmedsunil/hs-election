<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create(Request $request)
    {

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:posts'
        ]);

        $posts = Post::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:posts,name, ' . $id
        ]);

        $posts = Post::where('id', $id)
            ->update([
                'name' => $request->input('name')
            ]);

        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
