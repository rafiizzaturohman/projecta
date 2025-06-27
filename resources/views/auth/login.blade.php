<x-guest-layout>
    <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-surface p-6 sm:p-8 rounded-lg shadow-card w-full max-w-md mx-auto">
        @csrf

        <!-- Email Address -->
        <div class="mb-5">
            <x-input-label for="email" :value="__('Email')" class="text-text-primary font-medium" />
            <x-text-input
                id="email"
                class="mt-2 w-full px-4 py-2 bg-[#2E2E3E] text-text-primary border border-border rounded-lg focus:border-primary focus:ring-2 focus:ring-primary focus:outline-none transition"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger text-sm" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <x-input-label for="password" :value="__('Password')" class="text-text-primary font-medium" />
            <x-text-input
                id="password"
                class="mt-2 w-full px-4 py-2 bg-[#2E2E3E] text-text-primary border border-border rounded-lg focus:border-primary focus:ring-2 focus:ring-primary focus:outline-none transition"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger text-sm" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-5">
            <input
                id="remember_me"
                type="checkbox"
                class="rounded-md border-border bg-[#2E2E3E] text-primary focus:ring-primary focus:ring-2 focus:outline-none"
                name="remember"
            >
            <label for="remember_me" class="ms-2 text-sm text-text-secondary">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-primary hover:text-primary-hover underline transition-all duration-200">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-primary hover:bg-primary-hover text-white px-5 py-2 rounded-lg transition-all duration-200">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
