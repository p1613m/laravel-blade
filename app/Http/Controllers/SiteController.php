<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $posts = Post::query()->orderBy('id', 'DESC');
        $categoryId = \request()->get('category_id'); // $_GET['category_id'] $_POST['category_id']
        $userId = \request()->get('user_id');

        if($categoryId) {
            $posts->where('category_id', $categoryId);
        }
        if($userId) {
            $posts->where('user_id', $userId);
        }

        return view('index', [
            'posts' => $posts->get(),
        ]);
    }
}
