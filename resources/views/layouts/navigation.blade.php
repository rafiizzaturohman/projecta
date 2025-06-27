<nav x-data="{ open: false, darkMode: localStorage.getItem('theme') === 'dark' }"
     x-init="$watch('darkMode', val => {
         localStorage.setItem('theme', val ? 'dark' : 'light');
         document.documentElement.classList.toggle('dark', val);
     })"
     class="bg-surface dark:bg-dark-surface border-b border-border dark:border-dark-border text-text-primary dark:text-dark-text-primary shadow-md transition-colors duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo & Navigation -->
            <div class="flex items-center space-x-10">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-primary hover:opacity-90 transition" />
                </a>

                @php $role = auth()->user()->role; @endphp

                <div class="hidden sm:flex space-x-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                class="text-text-primary dark:text-dark-text-primary hover:text-primary transition">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if ($role !== 'admin')
                        <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.index')"
                                    class="text-text-primary dark:text-dark-text-primary hover:text-primary transition">
                            {{ __('Tugas') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('userManagement.index')" :active="request()->routeIs('userManagement.index')"
                                    class="text-text-primary dark:text-dark-text-primary hover:text-primary transition">
                            {{ __('Manajemen Pengguna') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right Actions -->
            <div class="hidden sm:flex items-center space-x-4">
                <!-- Theme Toggle -->
                <button @click="darkMode = !darkMode"
                        class="flex items-center gap-2 px-3 py-1.5 rounded-full text-sm
                               text-text-secondary dark:text-dark-text-secondary
                               bg-border dark:bg-dark-border hover:bg-primary-hover dark:hover:bg-dark-primary-hover transition">
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3v1m0 16v1m8.485-8.485h1m-16.97 0h1M16.95 7.05l.707-.707M5.636 18.364l.707-.707M16.95 16.95l.707.707M5.636 5.636l.707.707M12 5a7 7 0 100 14 7 7 0 000-14z"/>
                    </svg>
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                    <span x-text="darkMode ? 'Dark' : 'Light Mode'"></span>
                </button>

                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open"
                            class="flex items-center px-4 py-2 text-sm font-medium
                                   text-text-secondary dark:text-dark-text-secondary
                                   bg-surface dark:bg-dark-surface hover:text-primary rounded-xl transition">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 
                            1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition class="absolute right-0 mt-2 w-48 rounded-xl shadow-lg
                                                           bg-surface dark:bg-dark-surface border border-border dark:border-dark-border py-1 z-50">
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-2 text-sm text-text-secondary dark:text-dark-text-secondary
                                  hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:text-primary rounded transition">
                            {{ __('Profile') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); this.closest('form').submit();"
                               class="block px-4 py-2 text-sm text-text-secondary dark:text-dark-text-secondary
                                      hover:bg-primary-hover dark:hover:bg-dark-primary-hover hover:text-primary rounded transition">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                        class="p-2 rounded-md text-text-secondary dark:text-dark-text-secondary
                               hover:text-primary hover:bg-primary-hover transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div :class="{ 'block': open, 'hidden': !open }"
         class="sm:hidden bg-surface dark:bg-dark-surface border-t border-border dark:border-dark-border px-4 pt-4 pb-3 space-y-2">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                               class="text-text-primary dark:text-dark-text-primary hover:text-primary">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>

        @if ($role !== 'admin')
            <x-responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.index')"
                                   class="text-text-primary dark:text-dark-text-primary hover:text-primary">
                {{ __('Tugas') }}
            </x-responsive-nav-link>
        @else
            <x-responsive-nav-link :href="route('userManagement.index')" :active="request()->routeIs('userManagement.index')"
                                   class="text-text-primary dark:text-dark-text-primary hover:text-primary">
                {{ __('Manajemen Pengguna') }}
            </x-responsive-nav-link>
        @endif

        <!-- Theme Toggle Mobile -->
         <div class="absolute top-4 right-4">
                <button @click="darkMode = !darkMode"
                        class="flex items-center gap-2 px-3 py-1.5 rounded-full text-sm
                               text-text-secondary dark:text-dark-text-secondary
                               bg-border dark:bg-dark-border hover:bg-primary-hover hover:text-white dark:hover:bg-dark-primary-hover
                               transition">
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3v1m0 16v1m8.485-8.485h1m-16.97 0h1M16.95 7.05l.707-.707M5.636 18.364l.707-.707M16.95 16.95l.707.707M5.636 5.636l.707.707M12 5a7 7 0 100 14 7 7 0 000-14z"/>
                    </svg>
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                    <span x-text="darkMode ? 'Dark' : 'Light Mode'"></span>
                </button>
            </div>

        <div class="border-t border-border dark:border-dark-border pt-3">
            <div class="text-base font-medium text-text-primary dark:text-dark-text-primary">{{ Auth::user()->name }}</div>
            <div class="text-sm font-medium text-text-secondary dark:text-dark-text-secondary">{{ Auth::user()->email }}</div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"
                                       class="text-text-primary dark:text-dark-text-primary hover:text-primary">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault(); this.closest('form').submit();"
                                           class="text-text-primary dark:text-dark-text-primary hover:text-primary">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
