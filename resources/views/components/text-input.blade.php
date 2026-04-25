@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-md shadow-sm transition ease-in-out duration-150 border border-border-light text-accent-light bg-surface-light focus:bg-background-light focus:border-primary-light focus:ring-primary-light | dark:border-border-dark dark:bg-surface-dark dark:text-accent-dark dark:focus:bg-background-dark dark:focus:primary-dark dark:focus:ring-primary-dark']) }}>
