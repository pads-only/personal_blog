@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-primary-light dark:border-primary-dark text-start text-base font-medium text-primary-light dark:text-primary-dark bg-primary-light/10 dark:bg-primary-dark/10 focus:outline-none focus:text-accent-light dark:focus:text-accent-dark focus:bg-primary-light/20 dark:focus:bg-primary-dark/20 focus:border-primary-light dark:focus:border-primary-dark/20 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-text-light dark:text-text-dark hover:text-accent-light dark:hover:text-accent-dark hover:bg-background-light dark:hover:bg-background-dark hover:border-border-light dark:hover:border-border-dark focus:outline-none focus:text-accent-light dark:focus:text-accent-dark focus:bg-primary-light/20 dark:focus:bg-primary-dark/20 focus:border-primary-light/50 dark:focus:border-primary-dark/50 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
