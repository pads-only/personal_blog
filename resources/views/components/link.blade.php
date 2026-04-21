<a {{ $attributes->merge([
    'type' => 'button',
    'class' => '
        inline-flex items-center px-4 py-2
        bg-transparent
        border border-primary-light dark:border-primary-dark
        rounded-md

        font-semibold text-xs uppercase tracking-widest
        text-primary-light dark:text-primary-dark

        shadow-sm

        hover:bg-primary-light dark:hover:bg-primary-dark
        hover:text-background-light dark:hover:text-background-light

        focus:outline-none
        focus:ring-2 focus:ring-primary-light focus:ring-offset-2
        focus:ring-offset-background-light dark:focus:ring-offset-background-dark

        transition ease-in-out duration-150
    '
]) }}>
    {{ $slot }}
</a>