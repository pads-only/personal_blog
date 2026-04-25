<x-app-layout>
    <div class="max-w-5xl mx-auto mt-10 p-6 sm:pt-0 space-y-4 bg-background-light dark:bg-background-dark">
        <form method="POST" action="/blog" id="postForm">
            @csrf
            <div class="flex justify-end">
                <x-button.primary >Publish</x-button.primary>
            </div>
            <div class="space-y-4">
                <div>
                    <input
                        type="text"
                        name="title"
                        value="{{old('title')}}"
                        class="w-full text-5xl pl-4 tracking-wide| text-accent-light dark:text-accent-dark bg-transparent border-none outline-l focus:border-l focus:ring-0 focus:border-border-dark"
                        placeholder="Post title..."/>
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
        window.oldContent = @json(old('content'));
    </script>
</x-app-layout>