<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text-light dark:text-text-dark leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>
    <div class="max-w-5xl mx-auto mt-10 p-6 sm:pt-0 space-y-4 bg-background-light dark:bg-background-dark">
        <form method="POST" action="/blog" class="dark:text-text-primary-dark">
            @csrf
                <div>
                <input 
                    type="text" 
                    name="title"
                    class="w-full text-lg sm:text-xl font-semibold px-3 py-2 bg-transparent border-b border-border-light dark:border-border-dark focus:outline-none focus:border-primary"
                    placeholder="Post title..."/>
                    <x-input-error :messages="$errors->get('title')"></x-input-error>

            </div>
            <div class="border border-border-light dark:border-border-dark rounded-lg p-3 sm:p-4 bg-background-light dark:bg-background-dark">
                <div id="editorjs" class="prose dark:prose-invert max-w-none"></div>
                <input type="hidden" class="dark:text-text-primary-dark" name="content" id="content"/>
            </div>
            <x-input-error :messages="$errors->get('content')"></x-input-error>

            <button type="submit">Save</button>
        </form>
    </div>
    <x-toggle-theme/>
</x-app-layout>