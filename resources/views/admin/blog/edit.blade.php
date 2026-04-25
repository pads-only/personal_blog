<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 p-6 sm:pt-0 space-y-4 bg-background-light dark:bg-background-dark">
        <form method="POST" id="postForm" action="{{ route('blog.update', $post->slug) }}">
            @csrf
            @method('PATCH')
            <div class="flex justify-end">
                <x-button.primary >Update</x-button.primary>
            </div>
            <div class="space-y-4">
                <div>
                    <input
                        type="text"
                        name="title"
                        value="{{$post->title}}"
                        class="w-full text-5xl pl-4 tracking-wide| text-accent-light dark:text-accent-dark bg-transparent border-none outline-l focus:border-l focus:ring-0 focus:border-border-dark"
                        placeholder="Post title..."
                        autofocus
                    />
                        <x-input-error :messages="$errors->get('title')"></x-input-error>
                </div>
                <div class="w-full px-3">
                    <div id="editorjs" class="prose dark:prose-invert text-lg leading-3 tracking-wide"></div>
                    <input type="hidden" class="dark:text-text-primary-dark" name="content" id="content"/>
                </div>
                <x-input-error :messages="$errors->get('content')"></x-input-error>
            </div>
        </form>
    </div>
    <script>
        window.editorData = @json($post->content);
    </script>
</x-app-layout>