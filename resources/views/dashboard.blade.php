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
                        

                        <div class="mb-8 flex justify-between items-start">
                            <div>
                                <h1 class="text-2xl font-bold">Hai, {{ auth()->user()->nama }}!</h1>
                                <p class="text-text-secondary dark:text-dark-text-secondary mt-2">Lacak progres proyek dan tugas Anda</p>
                            </div>
                        </div>

                        <!-- Progress Overview -->
                        <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Project Progress -->
                            <div class="bg-surface-50 dark:bg-dark-surface-50 p-4 rounded-xl border border-border dark:border-dark-border">
                                <h3 class="font-medium mb-3">Proyek Aktif</h3>
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 relative">
                                        <svg class="w-full h-full" viewBox="0 0 36 36">
                                            <path d="M18 2.0845
                                              a 15.9155 15.9155 0 0 1 0 31.831
                                              a 15.9155 15.9155 0 0 1 0 -31.831"
                                              fill="none" stroke="#E2E8F0" stroke-width="3"/>
                                            <path d="M18 2.0845
                                              a 15.9155 15.9155 0 0 1 0 31.831
                                              a 15.9155 15.9155 0 0 1 0 -31.831"
                                              fill="none" stroke="#4C9F9A" stroke-width="3" stroke-dasharray="75, 100"/>
                                        </svg>
                                        <span class="absolute inset-0 flex items-center justify-center text-sm font-bold">75%</span>
                                    </div>
                                    <div>
                                        <p class="text-2xl font-bold">3/4</p>
                                        <p class="text-sm text-text-secondary">Proyek selesai</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Task Progress -->
                            <div class="bg-surface-50 dark:bg-dark-surface-50 p-4 rounded-xl border border-border dark:border-dark-border">
                                <h3 class="font-medium mb-3">Tugas Mendekati Deadline</h3>
                                <div class="space-y-2">
                                    <div>
                                        <div class="flex justify-between text-sm mb-1">
                                            <span>Analisis Requirements</span>
                                            <span>2 hari lagi</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-warning h-2 rounded-full" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-between text-sm mb-1">
                                            <span>UI Design</span>
                                            <span>5 hari lagi</span>
                                        </div>
                                        <div class="w-full bg-gray-200 rounded-full h-2">
                                            <div class="bg-secondary h-2 rounded-full" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Supervisor -->
                            <div class="bg-surface-50 dark:bg-dark-surface-50 p-4 rounded-xl border border-border dark:border-dark-border">
                                <h3 class="font-medium mb-3">Dosen Pembimbing</h3>
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white">
                                        {{ substr("Dr. Ahmad Budiman", 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-medium">Dr. Ahmad Budiman</p>
                                        <p class="text-sm text-text-secondary">3 proyek aktif</p>
                                    </div>
                                </div>
                                <button class="mt-4 w-full py-2 border border-primary text-primary rounded-lg hover:bg-primary/10 transition">
                                    Hubungi
                                </button>
                            </div>
                        </div>

                        <!-- Main Content Tabs -->
                        <div x-data="{ activeSection: 'projects' }" class="space-y-6">
                            <!-- Navigation -->
                            <div class="flex space-x-4 border-b border-border dark:border-dark-border">
                                <button @click="activeSection = 'tasks'" 
                                        :class="{ 'border-b-2 border-primary text-primary': activeSection === 'tasks' }"
                                        class="pb-3 px-1 font-medium">
                                    Tugas Saya
                                </button>
                                 <button @click="activeSection = 'projects'" 
                                        :class="{ 'border-b-2 border-primary text-primary': activeSection === 'projects' }"
                                        class="pb-3 px-1 font-medium">
                                    Proyek Saya
                                </button>
                                <button @click="activeSection = 'invite'" 
                                        :class="{ 'border-b-2 border-primary text-primary': activeSection === 'invite' }"
                                        class="pb-3 px-1 font-medium">
                                    Proyek Member
                                </button>
                            </div>

                            <!-- Projects Section -->
                            <div x-show="activeSection === 'projects'" x-transition>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Project Card -->
                                    @foreach ($projects as $project)
                                        @php
                                            $total = $project->total_tasks;
                                            $done = $project->completed_tasks;
                                            $progress = $total > 0 ? round(($done / $total) * 100) : 0;
                                        @endphp

                                        <div class="border border-border dark:border-dark-border rounded-xl overflow-hidden hover:shadow-soft transition-shadow">
                                            <div class="p-5">
                                                <div class="flex justify-between items-start">
                                                    <h3 class="font-bold text-lg">{{ $project->judul }}</h3>
                                                    <span class="px-2 py-1 text-xs rounded-full bg-success/10 text-success">
                                                        {{ ucfirst($project->status) }}
                                                    </span>
                                                </div>
                                                <p class="text-text-secondary dark:text-dark-text-secondary mt-2 text-sm">
                                                    {{ $project->deskripsi ?? 'Tidak ada deskripsi.' }}
                                                </p>
                                                
                                                <div class="mt-4">
                                                    <div class="flex justify-between text-sm mb-1">
                                                        <span>Progress</span>
                                                        <span>{{ $progress }}%</span>
                                                    </div>
                                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                                        <div class="bg-primary h-2 rounded-full transition-all duration-500" style="width: {{ $progress }}%"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-4 flex justify-between items-center">
                                                    <div class="flex -space-x-2">
                                                        <div class="w-8 h-8 rounded-full bg-secondary flex items-center justify-center text-white text-xs">
                                                            {{ \Illuminate\Support\Str::upper(substr($project->mahasiswa->nama ?? '??', 0, 2)) }}
                                                        </div>
                                                        {{-- Tambahkan user lain jika perlu --}}
                                                    </div>
                                                    <span class="text-xs text-text-secondary">
                                                        Deadline: {{ \Carbon\Carbon::parse($project->deadline)->translatedFormat('d M Y') }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="border-t border-border dark:border-dark-border px-5 py-3 bg-surface-50 dark:bg-dark-surface-50 flex justify-end space-x-2">
                                                <button class="text-primary hover:text-primary-hover text-sm">Detail</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- End Project Card -->
                                </div>
                            </div>

                            <!-- Tasks Section -->
                            <div x-show="activeSection === 'tasks'" x-transition style="display: none;">
                                <div class="space-y-4">
                                    <!-- Task Item -->
                                    <div class="border border-border dark:border-dark-border rounded-lg p-4 hover:shadow-soft transition-shadow">
                                        <div class="flex justify-between">
                                            <div>
                                                <h4 class="font-medium">Membuat ERD Database</h4>
                                                <p class="text-sm text-text-secondary">Sistem Manajemen Tugas</p>
                                            </div>
                                            <span class="px-2 py-1 text-xs rounded-full bg-success/10 text-success">Selesai</span>
                                        </div>
                                        
                                        <div class="mt-3 flex items-center justify-between">
                                            <div class="flex items-center space-x-2 text-sm text-text-secondary">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <span>12 Jun 2023</span>
                                            </div>
                                            <button class="text-primary hover:text-primary-hover text-sm">Detail</button>
                                        </div>
                                    </div>
                                    <!-- End Task Item -->
                                </div>
                            </div>

                            <!-- Invite Section -->
                            <div x-show="activeSection === 'invite'" x-transition style="display: none;">
                                <div class="max-w-md mx-auto">
                                    <div class="bg-surface-50 dark:bg-dark-surface-50 p-6 rounded-xl border border-border dark:border-dark-border">
                                        <h3 class="font-bold text-lg mb-4">Undang Anggota Tim</h3>
                                        <form class="space-y-4">
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Proyek</label>
                                                <select class="w-full border border-border dark:border-dark-border rounded-lg px-3 py-2 bg-surface dark:bg-dark-surface">
                                                    <option>Sistem Manajemen Tugas</option>
                                                    <option>Aplikasi E-Learning</option>
                                                </select>
                                            </div>
                                            
                                            <div>
                                                <label class="block text-sm font-medium mb-1">Email/NIM</label>
                                                <input type="text" placeholder="Masukkan email atau NIM" class="w-full border border-border dark:border-dark-border rounded-lg px-3 py-2 bg-surface dark:bg-dark-surface">
                                                <p class="text-xs text-text-secondary mt-1">Gunakan NIM untuk mahasiswa atau email untuk dosen</p>
                                            </div>
                                            
                                            <button type="button" @click="toast.success('Undangan terkirim!')" class="w-full py-2 bg-primary hover:bg-primary-hover text-white rounded-lg transition">
                                                Undang Anggota
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2 w-80"></div>
</x-app-layout>

<!-- Initialize Toast Notification -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toast function
        window.toast = {
            success: function(message) {
                const toast = document.createElement('div');
                toast.className = 'p-4 bg-success text-white rounded-lg shadow-soft flex items-center justify-between animate-fade-in';
                toast.innerHTML = `
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>${message}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="ml-4 text-white hover:text-white/80">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                `;
                document.getElementById('toast-container').appendChild(toast);
                setTimeout(() => toast.remove(), 5000);
            },
            error: function(message) {
                const toast = document.createElement('div');
                toast.className = 'p-4 bg-danger text-white rounded-lg shadow-soft flex items-center justify-between animate-fade-in';
                toast.innerHTML = `
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>${message}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="ml-4 text-white hover:text-white/80">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                `;
                document.getElementById('toast-container').appendChild(toast);
                setTimeout(() => toast.remove(), 5000);
            }
        };
    });
</script>

<!-- Custom Animation for Toast -->
<style>
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
