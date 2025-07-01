<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary border border-border dark:border-dark-border shadow-soft sm:rounded-2xl transition-colors duration-300">
                <div class="p-6">
                    @php
                        $role = auth()->user()->role;
                        $userName = auth()->user()->nama;
                    @endphp

                    @if ($role === 'admin')
                        <h3 class="text-xl font-bold mb-2">Admin Dashboard</h3>
                        <p>Welcome, {{ $userName }}! You have full access to the system.</p>
                        <ul class="list-disc list-inside mt-3 text-text-secondary dark:text-dark-text-secondary">
                            <li>Manage Users</li>
                            <li>View All Projects</li>
                            <li>System Settings</li>
                        </ul>

                    @elseif ($role === 'dosen')
                        <h3 class="text-xl font-bold mb-2">Dosen Dashboard</h3>
                        <p>Welcome, {{ $userName }}! You can monitor student projects.</p>
                        <ul class="list-disc list-inside mt-3 text-text-secondary dark:text-dark-text-secondary">
                            <li>View Assigned Courses</li>
                            <li>Review Project Submissions</li>
                        </ul>

                    @elseif ($role === 'mahasiswa')
                        <p>
                            <strong class="text-lg">Hai, {{ $userName }}!</strong> <br><br>
                            <strong class="text-base">Atur semua Proyek dan Tugas Kamu disini!</strong>
                        </p>
                        <ul class="list-disc list-inside mt-3 text-text-secondary dark:text-dark-text-secondary">
                            <li>Buat dan Gabung proyek</li>
                            <li>Lacak Kemajuan Tugas</li>
                        </ul>

                    @else
                        <p class="text-red-600 dark:text-red-400">Role tidak dikenali.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
