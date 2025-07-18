<x-app-layout>
    <div class="py-12">
        <div class="max-w-[1640px] mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary border border-border dark:border-dark-border shadow-soft sm:rounded-2xl transition-colors duration-300">
                <div class="p-6">
                    @php
                        $role = auth()->user()->role;
                        $userName = auth()->user()->nama;
                    @endphp

                    @if ($role === 'admin')
                        @include('dashboard.admin')

                    @elseif ($role === 'dosen')
                        @include('dashboard.dosen')

                    @elseif ($role === 'mahasiswa')
                        @include('dashboard.mahasiswa')

                    @endif
                </div>
            </div>
        </div>
    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2 w-80"></div>
</x-app-layout>
