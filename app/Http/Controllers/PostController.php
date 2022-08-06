<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('post', compact('post'));
//        return view('post', [
//            'post' => $post,
//        ]);
    }

    public function create()
    {
        return view('create-post');
    }

    public function store(PostRequest $request)
    {
        $post = Auth::user()->posts()->create($request->validated());
        $post->fillImage($request->file('image'));

        return redirect()->route('home');
    }

    public function my()
    {
        return view('my-posts', [
            'posts' => Auth::user()->posts()->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function delete(Post $post)
    {
        if($post->user_id == Auth::id()) {
            $post->delete();
        }

        return redirect()->route('my-posts');
    }
}
