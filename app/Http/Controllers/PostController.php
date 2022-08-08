<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
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

    public function edit(Post $post)
    {
        if($post->user_id == Auth::id()) {
            return view('edit-post', compact(['post']));
            // compact(['post', 'user', 'comment']) =>
            // [
            //    'post' => $post,
            //    'user' => $user,
            //    'comment' => $comment,
            // ]
        }

        return redirect()->route('my-posts');
    }

    public function update(Post $post, PostUpdateRequest $request)
    {
        if($post->user_id == Auth::id()) {
            $post->update($request->validated());
            if($request->file('image')) {
                $post->fillImage($request->file('image'));
            }
        }

        return redirect()->route('my-posts');
    }
}
