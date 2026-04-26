<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::where('status', 'published')->latest()->paginate(7);
        return view('guest.index', ['posts' => $posts]);
    }

    public function show(Post $post): View
    {
        if ($post->statu !== 'published') {
            abort(404);
        }

        return view('guest.show', ['post' => $post]);
    }
}
