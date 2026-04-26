<x-guest-layout>
    <div class="mx-auto max-w-3xl">
        <div class="py-10 border-b border-border-light dark:border-border-dark">
            <h1 href="/blog/{{$post->slug}}" class="text-5xl font-bold tracking-wide">{{__($post->title)}}</h1>
            <p class="text-sm mt-6">{{$post->user->name}} - <span>{{__($post->created_at->format("M y, Y"))}}</span></p> 
        </div>
        <div class="prose prose-lg max-w-none dark:prose-invert my-10 font-serif tracking-wide">
            @foreach ($post->content['blocks'] as $block)
                @includeIf('blocks.' . $block['type'] , ['data' => $block['data']])
            @endforeach
        </div>
    </div>
</x-guest-layout>