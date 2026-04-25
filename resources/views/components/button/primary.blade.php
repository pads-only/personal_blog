@props(['disabled' => false])

@php
    $classes = $disabled ? "inline-flex items-center px-4 py-2 text-sm font-medium rounded-md cursor-not-allowed
            bg-surface-light dark:bg-surface-dark
            border border-border-light dark:border-border-dark
            text-muted-light dark:text-muted-dark"
            :
            "inline-flex items-center px-4 py-2
        bg-primary-light text-surface-light
        dark:bg-primary-dark dark:text-background-dark
        border border-transparent rounded-md
        font-semibold text-xs uppercase tracking-widest

        hover:bg-primary-dark dark:hover:bg-primary-light
        focus:bg-primary-dark dark:focus:bg-primary-light
        active:bg-primary-light dark:active:bg-primary-dark

        focus:outline-none focus:ring-2 focus:ring-primary-light focus:ring-offset-2
        dark:focus:ring-offset-background-dark

        transition ease-in-out duration-150";

@endphp

<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => $classes
]) }}>
    {{ $slot }}
</button>