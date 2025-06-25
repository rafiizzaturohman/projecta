<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $role = auth()->user()->role;
                    @endphp

                    @if ($role === 'admin')
                        <h3 class="text-xl font-bold mb-2">Admin Dashboard</h3>
                        <p>Welcome, Admin! You have full access to the system.</p>
                        <ul class="list-disc list-inside mt-3">
                            <li>Manage Users</li>
                            <li>View All Projects</li>
                            <li>System Settings</li>
                        </ul>

                    @elseif ($role === 'dosen')
                        <h3 class="text-xl font-bold mb-2">Dosen Dashboard</h3>
                        <p>Welcome, Dosen! You can monitor student projects.</p>
                        <ul class="list-disc list-inside mt-3">
                            <li>View Assigned Courses</li>
                            <li>Review Project Submissions</li>
                        </ul>

                    @elseif ($role === 'mahasiswa')
                        <h3 class="text-xl font-bold mb-2">Mahasiswa Dashboard</h3>
                        <p>Welcome, Mahasiswa! Manage your tasks and projects here.</p>
                        <ul class="list-disc list-inside mt-3">
                            <li>Create and Join Projects</li>
                            <li>Track Task Progress</li>
                        </ul>

                    @else
                        <p>Role tidak dikenali.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
