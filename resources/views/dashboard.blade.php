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
                        @include('dashboard.mahasiswa')

                    @endif

        <!-- Invite Section -->
        <div
            x-show="activeSection === 'invite'"
            x-transition
            style="display: none"
        >
            <div class="max-w-md mx-auto">
                <div
                    class="bg-surface-50 dark:bg-dark-surface-50 p-6 rounded-xl border border-border dark:border-dark-border"
                >
                    <h3 class="font-bold text-lg mb-4">Undang Anggota Tim</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">
                                Proyek
                            </label>
                            <select
                                class="w-full border border-border dark:border-dark-border rounded-lg px-3 py-2 bg-surface dark:bg-dark-surface"
                            >
                                <option>Sistem Manajemen Tugas</option>
                                <option>Aplikasi E-Learning</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">
                                Email/NIM
                            </label>
                            <input
                                type="text"
                                placeholder="Masukkan email atau NIM"
                                class="w-full border border-border dark:border-dark-border rounded-lg px-3 py-2 bg-surface dark:bg-dark-surface"
                            />
                            <p class="text-xs text-text-secondary mt-1">
                                Gunakan NIM untuk mahasiswa atau email untuk
                                dosen
                            </p>
                        </div>

                        <button
                            type="button"
                            @click="toast.success('Undangan terkirim!')"
                            class="w-full py-2 bg-primary hover:bg-primary-hover text-white rounded-lg transition"
                        >
                            Undang Anggota
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2 w-80"></div>
</x-app-layout>
