<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $role = auth()->user()->role;
                        $userName = auth()->user()->nama;
                    @endphp

                    @if ($role === 'admin')
                        <h3 class="text-xl font-bold mb-2">Admin Dashboard</h3>
                        <p>Welcome, {{ $userName }}! You have full access to the system.</p>
                        <ul class="list-disc list-inside mt-3">
                            <li>Manage Users</li>
                            <li>View All Projects</li>
                            <li>System Settings</li>
                        </ul>

                    @elseif ($role === 'dosen')
                        <h3 class="text-xl font-bold mb-2">Dosen Dashboard</h3>
                        <p>Welcome`, {{ $userName }}! You can monitor student projects.</p>
                        <ul class="list-disc list-inside mt-3">
                            <li>View Assigned Courses</li>
                            <li>Review Project Submissions</li>
                        </ul>

                    @elseif ($role === 'mahasiswa')
                        <p><strong>Hai, {{ $userName }}!</strong> <br> <br>
                            <strong>Atur semua Proyek dan Tugas Kamu disini!</strong>
                        </p>
                        <ul class="list-disc list-inside mt-3">
                            <li>Buat dan Gabung proyek</li>
                            <li>Lacak Kemajuan Tugas</li>
                        </ul>

                    @else
                        <p>Role tidak dikenali.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
