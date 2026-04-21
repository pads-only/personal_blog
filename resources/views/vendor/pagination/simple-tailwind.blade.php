@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}"
     class="flex gap-2 items-center justify-between">

    {{-- Previous --}}
    @if ($paginator->onFirstPage())
        <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md cursor-not-allowed
            bg-surface-light dark:bg-surface-dark
            border border-border-light dark:border-border-dark
            text-muted-light dark:text-muted-dark">
            {!! __('pagination.previous') !!}
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition
           bg-transparent
           border border-primary-light dark:border-primary-dark
           text-primary-light dark:text-primary-dark hover:text-background-light dark:hover:text-background-light
           hover:bg-primary-light dark:hover:bg-primary-dark
           
            focus:outline-none
            focus:ring-2 focus:ring-primary-light focus:ring-offset-2
            focus:ring-offset-background-light dark:focus:ring-offset-background-dark
           ">
            {!! __('pagination.previous') !!}
        </a>
    @endif

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
           class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md transition
           bg-transparent
           border border-primary-light dark:border-primary-dark
           text-primary-light dark:text-primary-dark hover:text-background-light dark:hover:text-background-light
           hover:bg-primary-light dark:hover:bg-primary-dark

            focus:outline-none
            focus:ring-2 focus:ring-primary-light focus:ring-offset-2
            focus:ring-offset-background-light dark:focus:ring-offset-background-dark
           
           ">
            {!! __('pagination.next') !!}
        </a>
    @else
        <span class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md cursor-not-allowed
            bg-surface-light dark:bg-surface-dark
            border border-border-light dark:border-border-dark
            text-muted-light dark:text-muted-dark">
            {!! __('pagination.next') !!}
        </span>
    @endif

</nav>
@endif