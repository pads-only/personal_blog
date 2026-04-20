<button {{ $attributes->merge([
    'type' => 'button',
    'class' => '
        inline-flex items-center px-4 py-2
        bg-surface-light dark:bg-surface-dark
        border border-border-light dark:border-border-dark
        rounded-md

        font-semibold text-xs uppercase tracking-widest
        text-text-primary-light dark:text-text-primary-dark

        shadow-sm

        hover:bg-primary-light dark:hover:bg-primary-dark
        hover:text-white

        focus:outline-none
        focus:ring-2 focus:ring-accent focus:ring-offset-2
        focus:ring-offset-background-light dark:focus:ring-offset-background-dark

        active:bg-accent dark:active:bg-accent-light

        disabled:opacity-25

        transition ease-in-out duration-150
    '
]) }}>
    {{ $slot }}
</button>