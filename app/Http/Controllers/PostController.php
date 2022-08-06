<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('create-post');
    }

    public function store(PostRequest $request)
    {
//        $additionalData = [
//            'user_id' => Auth::id(),
//        ];
//
//        Post::query()->create($additionalData + $request->validated());

        $user = Auth::user();

        $user->posts()->create($request->validated());

        return redirect()->route('home');
    }
}
