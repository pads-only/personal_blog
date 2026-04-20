<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => '
        inline-flex items-center px-4 py-2
        bg-primary text-white
        dark:bg-primary-dark dark:text-white
        border border-transparent rounded-md
        font-semibold text-xs uppercase tracking-widest

        hover:bg-primary-dark dark:hover:bg-primary-light
        focus:bg-primary-dark dark:focus:bg-primary-light
        active:bg-accent dark:active:bg-accent-light

        focus:outline-none focus:ring-2 focus:ring-accent focus:ring-offset-2
        dark:focus:ring-offset-surface-dark

        transition ease-in-out duration-150
    '
]) }}>
    {{ $slot }}
</button>