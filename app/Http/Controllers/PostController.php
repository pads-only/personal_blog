<?php

namespace App\Http\Controllers;

use AlAminFirdows\LaravelEditorJs\Facades\LaravelEditorJs;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Spatie\Flash\Flash;

class PostController extends Controller
{
    public function index(): View
    {
        Gate::authorize('viewAny', Post::class);

        $posts = Post::latest()
            ->simplePaginate(5);

        return view('admin.blog.index', ['posts' => $posts]);
    }

    public function create(): View
    {
        Gate::authorize('create', Post::class);

        return view('admin.blog.create');
    }

    public function edit(Post $post): View
    {
        Gate::authorize('update', $post);

        return view('admin.blog.edit', ['post' => $post]);
    }

    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('create', Post::class);

        $validatedAttributes = $request->validate([
            'title' => 'required|min:3|string',
            'content' => 'required'
        ]);

        $slug = Str::slug($validatedAttributes['title'], '-');

        $count = Post::where('slug', 'like', "$slug%")->count();

        $slug = $count ? "{$slug}-{$count}" : $slug;

        $content = json_decode($validatedAttributes['content'], true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['content' => 'Invalid Content']);
        }

        Post::create([
            'user_id' => Auth::id(),
            'slug' => $slug,
            'title' => $validatedAttributes['title'],
            'content' => $content,
            'published_at' => Carbon::now()
        ]);
        return redirect()->route('blog.index')
            ->with('success', 'New post has been create!');
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        Gate::authorize('update', $post);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return back()->withErrors(['content' => 'Invalid Content']);
        }

        $validatedAttributes = $request->validate([
            'title' => 'required|min:3|string',
            'content' => 'required'
        ]);

        $slug = Str::slug($validatedAttributes['title'], '-');

        $count = Post::where('slug', 'like', "$slug%")->count();

        $slug = $count ? "{$slug}-{$count}" : $slug;

        $content = json_decode($validatedAttributes['content'], true);

        $post->update([
            'slug' => $slug,
            'title' => $validatedAttributes['title'],
            'content' => $content
        ]);

        return redirect()->route('blog.show', $post->slug)->with('success', 'Post has been updated!');
    }

    public function show(Post $post): View
    {
        Gate::authorize('view', $post);

        return view('admin.blog.show', ['post' => $post]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize('delete', $post);

        $post->delete();

        return redirect()->back()->with('error', 'Post has been deleted!');
    }
}
