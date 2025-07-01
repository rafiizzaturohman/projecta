<x-guest-layout>
    {{-- Session Status --}}
    <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

    {{-- Login Form --}}
    <form method="POST" action="{{ route('login') }}"
          class="p-6 sm:p-8 w-full max-w-md mx-auto transition-colors">
        @csrf

        {{-- Email --}}
        <div class="mb-5">
            <x-input-label for="email" :value="__('Email')"
                           class="text-text-primary dark:text-dark-text-primary font-medium" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                class="mt-2 w-full px-4 py-2
                       bg-white dark:bg-[#2E2E3E]
                       text-text-primary dark:text-dark-text-primary
                       border border-border dark:border-dark-border
                       rounded-md focus:border-primary dark:focus:border-dark-primary
                       focus:ring-2 focus:ring-primary dark:focus:ring-dark-primary
                       focus:outline-none transition"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger text-sm" />
        </div>

        {{-- Password --}}
        <div class="mb-5">
            <x-input-label for="password" :value="__('Password')"
                           class="text-text-primary dark:text-dark-text-primary font-medium" />
            <x-text-input
                id="password"
                name="password"
                type="password"
                required
                autocomplete="current-password"
                class="mt-2 w-full px-4 py-2
                       bg-white dark:bg-[#2E2E3E]
                       text-text-primary dark:text-dark-text-primary
                       border border-border dark:border-dark-border
                       rounded-md focus:border-primary dark:focus:border-dark-primary
                       focus:ring-2 focus:ring-primary dark:focus:ring-dark-primary
                       focus:outline-none transition"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger text-sm" />
        </div>

        {{-- Remember Me --}}
        <div class="flex items-center mb-5">
            <input
                id="remember_me"
                name="remember"
                type="checkbox"
                class="rounded-md border-border dark:border-dark-border
                       bg-white dark:bg-[#2E2E3E]
                       text-primary dark:text-dark-primary
                       focus:ring-primary dark:focus:ring-dark-primary
                       focus:ring-2 focus:outline-none"
            >
            <label for="remember_me"
                   class="ms-2 text-sm text-text-secondary dark:text-dark-text-secondary">
                {{ __('Remember me') }}
            </label>
        </div>

        {{-- Actions --}}
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-primary dark:text-dark-primary
                          hover:text-primary-hover dark:hover:text-dark-primary-hover underline transition">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button
                class="bg-primary dark:bg-dark-primary
                       hover:bg-primary-hover dark:hover:bg-dark-primary-hover
                       text-white px-5 py-2 rounded-md font-medium transition">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    {{-- Include Alpine if not already --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</x-guest-layout>
