<x-guest-layout>
    <div class="mx-auto max-w-4xl">
        <div>
            <h1 class="text-4xl font-bold mt-6 py-10 border-b dark:border-border-dark">{{__("Welcome to my blog")}}</h1>
        </div>
        @forelse ($posts as $post)
            <div class="py-6 pl-4 border-l-4 mt-2 border-transparent hover:border-primary-dark transition ease-in-out duration-500">
                <small>{{__($post->created_at->format("M y, Y"))}}</small> <br>
                <a href="/blog/{{$post->slug}}" class="text-3xl font-bold">{{__($post->title)}}</a>
            </div>
        @empty
            <p class="text-2xl py-10">{{__("No post available")}}</p>
        @endforelse
    </div>
</x-guest-layout>