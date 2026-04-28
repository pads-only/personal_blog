@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-primary-light dark:text-primary-dark bg-surface-light dark:bg-surface-dark border border-primary-light dark:border-primary-dark'
            : 'text-muted-light dark:text-muted-dark hover:text-primary-light dark:hover:text-primary-dark cursor-pointer border-transparent';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' border rounded-lg flex items-center gap-4 px-2 h-10 hover:bg-surface-light dark:hover:bg-surface-dark hover:border-primary-ligt dark:hover:border-primary-dark'])}}>
    {{ $slot }}
</a>
