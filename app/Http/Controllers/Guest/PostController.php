<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::search($request->search)
            ->where('status', '1')
            ->latest()
            ->simplePaginate(7)
            ->withQueryString();

        $request->flash();

        return view('guest.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        if ($post->status !== 1) {
            abort(404);
        }
        return view('guest.show', compact('post'));
    }
}
