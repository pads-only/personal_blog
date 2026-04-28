@props(['heading'])

<nav x-data="{ open: false }" class="h-14 w-full z-10">
    <div class="max-w-7xl mx-auto h-14">
        <div class="flex justify-between h-14 lg:px-8 px-4 items-center">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center text-primary-light dark:text-primary-dark font-semibold">
                    {{ $heading ?? $slot }}
                </div>
            </div>
        <!-- Settings Dropdown -->
            <div class="hidden md:flex sm:items-center sm:ms-6">
                <div class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm rounded-md text-muted-light dark:text-muted-dark hover:text-text-light dark:hover:text-text-dark focus:outline-none transition">
                        <div>{{ Auth::user()->name }}</div>
                        <svg class="ml-2 h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" @click.outside="open = false" class="absolute overflow-hidden right-0 mt-2 w-48 bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark rounded-lg shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-muted hover:bg-background-light dark:hover:bg-background-dark">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-muted hover:bg-background-light dark:hover:bg-background-dark">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center md:hidden ">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-muted hover:text-text hover:bg-bg focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    {{-- <div :class="{'block z-50': open, 'hidden': ! open}" class="md:hidden bg-surface border-t border-border">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('manage-blogs')" :active="request()->routeIs('manage-blogs')">
                {{ __('Blogs') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('manage-projects.index')" :active="request()->routeIs('manage-projects')">
                {{ __('Projects') }}
            </x-responsive-nav-link>
        </div>
        <div class="px-4 py-3 space-y-2">
            <div class="text-sm text-text">{{ Auth::user()->name }}</div>
            <div class="text-xs text-muted">{{ Auth::user()->email }}</div>

            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm text-text hover:text-muted hover:bg-bg rounded-lg">Profile</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-3 py-2 text-sm text-text hover:text-muted hover:bg-bg rounded-lg">Log Out</button>
            </form>
        </div>
    </div> --}}
</nav>