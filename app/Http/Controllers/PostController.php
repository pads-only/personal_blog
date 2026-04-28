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
    public function index(Request $request): View
    {
        Gate::authorize('viewAny', Post::class);

        $posts = Post::search($request->search)
            ->status($request->filter)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        $request->flash();

        return view('admin.blog.index', compact('posts'));
    }

    public function create(): View
    {
        Gate::authorize('create', Post::class);

        return view('admin.blog.create');
    }

    public function edit(Post $post): View
    {
        Gate::authorize('update', $post);

        return view('admin.blog.edit', compact('post'));
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
            'excerpt' => Post::generateExcerpt($content),
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

        // dd(Post::generateExcerpt($content));

        $post->update([
            'slug' => $slug,
            'title' => $validatedAttributes['title'],
            'content' => $content,
            'excerpt' => Post::generateExcerpt($content)
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

        return redirect()->route('blog.index')->with('error', 'Post has been deleted!');
    }
}
