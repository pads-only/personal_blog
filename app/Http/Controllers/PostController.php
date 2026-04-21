<?php

namespace App\Http\Controllers;

use AlAminFirdows\LaravelEditorJs\Facades\LaravelEditorJs;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Post $posts): View
    {
        $posts = $posts::where('status', 'draft')->latest()->simplePaginate(5);

        return view('blog.index', ['posts' => $posts]);
    }

    public function create(): View
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        Post::create([
            'user_id' => '1',
            'slug' => 'slug-test-' . random_int(10, 99),
            'title' => $request->title,
            'content' => json_decode($request->content),
            'published_at' => Carbon::now()
        ]);
    }
}
