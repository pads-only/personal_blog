<?php

namespace App\Http\Controllers;

use AlAminFirdows\LaravelEditorJs\Facades\LaravelEditorJs;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Post $posts): View
    {
        $posts = $posts::latest()->simplePaginate(5);

        return view('blog.index', ['posts' => $posts]);
    }

    public function create(): View
    {
        return view('blog.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedAttributes = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required'
        ]);

        Post::create([
            'user_id' => '1',
            'slug' => Str::slug($validatedAttributes['title'], '-'),
            'title' => $validatedAttributes['title'],
            'content' => json_decode($validatedAttributes['content']),
            'published_at' => Carbon::now()
        ]);

        return redirect('/blog');
    }

    public function show(Post $post): View
    {
        return view('blog.show', ['post' => $post]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        // dd($post);
        $post->delete();

        return redirect('/blog');
    }
}
