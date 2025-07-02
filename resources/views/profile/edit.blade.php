<x-app-layout>
    @php
        $role = auth()->user()->role;
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            @if ($role === 'admin')
                <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
