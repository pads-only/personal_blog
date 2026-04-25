@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-primary-light dark:border-primary-dark text-sm font-medium leading-5 text-primary-light dark:text-primary-dark focus:outline-none focus:border-primary-light transition duration-150 ease-in-out'

            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-text-light dark:text-text-dark hover:text-gray-700 dark:hover:text-gray-300 hover:border-primary-light dark:hover:border-primary-dark focus:outline-none focus:text-accent-light dark:focus:text-accent-dark focus:border-primary-light focus:border-primary-dark transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
