<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-background-light dark:bg-background-dark">
            <div>
                <a href="/">
                    <x-application-logo />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-surface-light dark:bg-surface-dark shadow-md overflow-hidden sm:rounded-lg">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded shadow-sm border | bg-surface-light dark:bg-surface-dark focus:ring-primary-light dark:focus:ring-primary-dark text-accent-light |  border-border-light dark:border-border-dark focus:bg-background-light dark:focus:bg-background-dark focus:ring-offset-surface-light dark:focus:ring-offset-surface-dark" name="remember">
                            <span class="ms-2 text-sm | text-muted-light dark:text-muted-dark hover:text-text-light dark:hover:text-text-dark">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 | text-muted-light dark:text-muted-dark hover:text-text-light dark:hover:text-text-dark focus:ring-primary-light dark:focus:ring-primary-dark focus:text-accent-light dark:focus:text-accent-dark focus:ring-offset-background-light dark:focus:ring-offset-background-dark" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button.primary class="ms-3">
                            {{ __('Log in') }}
                        </x-button.primary>
                    </div>
                </form>
            </div>
        </div>
</x-guest-layout>
