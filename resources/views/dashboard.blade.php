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
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-text-primary dark:text-dark-text-primary">Dashboard Proyek</h1>
        <p class="text-text-secondary dark:text-dark-text-secondary">Ringkasan aktivitas dan progres proyek</p>
    </div>
    <button class="bg-primary dark:bg-dark-primary text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-primary-hover dark:hover:bg-dark-primary-hover transition-colors flex items-center gap-2 shadow-soft hover:scale-101">
        <i class="fas fa-plus"></i>
        Proyek Baru
    </button>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <!-- Total Proyek -->
    <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-101 transition-transform">
        <div class="w-12 h-12 rounded-xl bg-primary/10 dark:bg-dark-primary/10 text-primary dark:text-dark-primary flex items-center justify-center text-xl">
            <i class="fas fa-project-diagram"></i>
        </div>
        <div>
            <h3 class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium">Total Proyek</h3>
            <p class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary">14</p>
            <div class="text-xs text-success flex items-center gap-1">
                <i class="fas fa-arrow-up"></i>
                2 baru minggu ini
            </div>
        </div>
    </div>
    
    <!-- Tugas Aktif -->
    <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-101 transition-transform">
        <div class="w-12 h-12 rounded-xl bg-success/10 text-success flex items-center justify-center text-xl">
            <i class="fas fa-tasks"></i>
        </div>
        <div>
            <h3 class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium">Tugas Aktif</h3>
            <p class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary">36</p>
            <div class="text-xs text-danger flex items-center gap-1">
                <i class="fas fa-arrow-down"></i>
                5 selesai hari ini
            </div>
        </div>
    </div>
    
    <!-- Anggota Tim -->
    <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-101 transition-transform">
        <div class="w-12 h-12 rounded-xl bg-secondary/10 dark:bg-dark-secondary/10 text-secondary dark:text-dark-secondary flex items-center justify-center text-xl">
            <i class="fas fa-users"></i>
        </div>
        <div>
            <h3 class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium">Anggota Tim</h3>
            <p class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary">8</p>
            <div class="text-xs text-info flex items-center gap-1">
                <!-- <i class="fas fa-arrow-up"></i>
                2 baru bulan ini -->
            </div>
        </div>
    </div>
    
    <!-- dosen pengampuh -->
    <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-101 transition-transform">
        <div class="w-12 h-12 rounded-xl bg-danger/10 text-danger flex items-center justify-center text-xl">
            <i class="fas fa-calendar-times"></i>
        </div>
        <div>
            <h3 class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium">Dosen Pengampuh</h3>
            <p class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary">3</p>
            <div class="text-xs text-warning flex items-center gap-1">
                <!-- <i class="fas fa-exclamation-circle"></i>
                7 hari lagi -->
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Left Column (2/3 width) -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Projects Panel -->
        <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft overflow-hidden">
            <div class="border-b border-border dark:border-dark-border px-5 py-4 flex justify-between items-center">
                <h2 class="font-semibold text-text-primary dark:text-dark-text-primary">Proyek Terkini</h2>
                <button class="text-sm text-primary dark:text-dark-primary font-medium hover:text-primary-hover dark:hover:text-dark-primary-hover transition-colors">
                    Lihat Semua
                </button>
            </div>
            <div class="p-5 space-y-4">
                <!-- Project 1 -->
                <div class="border border-border dark:border-dark-border rounded-xl p-4 hover:border-primary dark:hover:border-dark-primary hover:shadow-soft transition-all cursor-pointer hover:scale-[1.005]">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-semibold text-text-primary dark:text-dark-text-primary">Website Redesign</h3>
                        <span class="bg-success/10 text-success text-xs px-2.5 py-0.5 rounded-full">Dalam Progress</span>
                    </div>
                    <div class="flex gap-4 mb-4">
                        <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                            <i class="far fa-calendar-alt"></i>
                            <span>15 Jun - 30 Jul 2023</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                            <i class="far fa-clock"></i>
                            <span>45% Complete</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-text-secondary dark:text-dark-text-secondary mb-1">
                            <span>Progress</span>
                            <span>45%</span>
                        </div>
                        <div class="w-full bg-border dark:bg-dark-border rounded-full h-1.5">
                            <div class="bg-primary dark:bg-dark-primary h-1.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full bg-info/10 text-info flex items-center justify-center text-xs font-bold border-2 border-surface dark:border-dark-surface">AM</div>
                            <div class="w-8 h-8 rounded-full bg-secondary/10 dark:bg-dark-secondary/10 text-secondary dark:text-dark-secondary flex items-center justify-center text-xs font-bold border-2 border-surface dark:border-dark-surface">TS</div>
                            <div class="w-8 h-8 rounded-full bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 flex items-center justify-center text-xs font-bold border-2 border-surface dark:border-dark-surface">RJ</div>
                            <div class="w-8 h-8 rounded-full bg-border dark:bg-dark-border text-text-secondary dark:text-dark-text-secondary flex items-center justify-center text-xs font-bold border-2 border-surface dark:border-dark-surface">+2</div>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                            <i class="far fa-comment-alt"></i>
                            <span>12</span>
                        </div>
                    </div>
                </div>
                
                <!-- Project 2 -->
                <div class="border border-border dark:border-dark-border rounded-xl p-4 hover:border-primary dark:hover:border-dark-primary hover:shadow-soft transition-all cursor-pointer hover:scale-[1.005]">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-semibold text-text-primary dark:text-dark-text-primary">Mobile App Development</h3>
                        <span class="bg-info/10 text-info text-xs px-2.5 py-0.5 rounded-full">Perencanaan</span>
                    </div>
                    <div class="flex gap-4 mb-4">
                        <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                            <i class="far fa-calendar-alt"></i>
                            <span>1 Jul - 15 Sep 2023</span>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                            <i class="far fa-clock"></i>
                            <span>15% Complete</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="flex justify-between text-sm text-text-secondary dark:text-dark-text-secondary mb-1">
                            <span>Progress</span>
                            <span>15%</span>
                        </div>
                        <div class="w-full bg-border dark:bg-dark-border rounded-full h-1.5">
                            <div class="bg-primary dark:bg-dark-primary h-1.5 rounded-full" style="width: 15%"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full bg-success/10 text-success flex items-center justify-center text-xs font-bold border-2 border-surface dark:border-dark-surface">KL</div>
                            <div class="w-8 h-8 rounded-full bg-cyan-100 dark:bg-cyan-900 text-cyan-800 dark:text-cyan-200 flex items-center justify-center text-xs font-bold border-2 border-surface dark:border-dark-surface">MP</div>
                            <div class="w-8 h-8 rounded-full bg-border dark:bg-dark-border text-text-secondary dark:text-dark-text-secondary flex items-center justify-center text-xs font-bold border-2 border-surface dark:border-dark-surface">+3</div>
                        </div>
                        <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                            <i class="far fa-comment-alt"></i>
                            <span>5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tasks Panel -->
        <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft overflow-hidden">
            <div class="border-b border-border dark:border-dark-border px-5 py-4 flex justify-between items-center">
                <h2 class="font-semibold text-text-primary dark:text-dark-text-primary">Tugas Saya</h2>
                <button class="text-sm text-primary dark:text-dark-primary font-medium hover:text-primary-hover dark:hover:text-dark-primary-hover transition-colors">
                    Lihat Semua
                </button>
            </div>
            <div class="p-5 space-y-3">
                <!-- Task 1 -->
                <div class="flex items-center p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background transition-colors">
                    <input type="checkbox" class="w-4 h-4 text-primary dark:text-dark-primary rounded border-border dark:border-dark-border focus:ring-primary/50 dark:focus:ring-dark-primary/50 mr-3">
                    <div class="flex-1">
                        <div class="font-medium text-text-primary dark:text-dark-text-primary">Mendesain UI homepage baru</div>
                        <div class="text-sm text-text-secondary dark:text-dark-text-secondary">Website Redesign</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-danger ml-4"></div>
                </div>
                
                <!-- Task 2 -->
                <div class="flex items-center p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background transition-colors">
                    <input type="checkbox" class="w-4 h-4 text-primary dark:text-dark-primary rounded border-border dark:border-dark-border focus:ring-primary/50 dark:focus:ring-dark-primary/50 mr-3">
                    <div class="flex-1">
                        <div class="font-medium text-text-primary dark:text-dark-text-primary">Membuat dokumentasi API</div>
                        <div class="text-sm text-text-secondary dark:text-dark-text-secondary">Mobile App Development</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-warning ml-4"></div>
                </div>
                
                <!-- Task 3 -->
                <div class="flex items-center p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background transition-colors">
                    <input type="checkbox" class="w-4 h-4 text-primary dark:text-dark-primary rounded border-border dark:border-dark-border focus:ring-primary/50 dark:focus:ring-dark-primary/50 mr-3" checked>
                    <div class="flex-1">
                        <div class="font-medium line-through text-text-secondary dark:text-dark-text-secondary">Meeting dengan klien</div>
                        <div class="text-sm text-text-secondary dark:text-dark-text-secondary">ProjectFlow Marketing</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-success ml-4"></div>
                </div>
                
                <!-- Task 4 -->
                <div class="flex items-center p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background transition-colors">
                    <input type="checkbox" class="w-4 h-4 text-primary dark:text-dark-primary rounded border-border dark:border-dark-border focus:ring-primary/50 dark:focus:ring-dark-primary/50 mr-3">
                    <div class="flex-1">
                        <div class="font-medium text-text-primary dark:text-dark-text-primary">Review kode frontend</div>
                        <div class="text-sm text-text-secondary dark:text-dark-text-secondary">Website Redesign</div>
                    </div>
                    <div class="w-2 h-2 rounded-full bg-danger ml-4"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Column (1/3 width) -->
    <div class="space-y-6">
        <!-- Activity Panel -->
        <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft overflow-hidden">
            <div class="border-b border-border dark:border-dark-border px-5 py-4">
                <h2 class="font-semibold text-text-primary dark:text-dark-text-primary">Aktivitas Terkini</h2>
            </div>
            <div class="p-5 space-y-4">
                <!-- Activity 1 -->
                <div class="flex gap-3">
                    <div class="w-9 h-9 rounded-full bg-info/10 text-info flex items-center justify-center font-semibold flex-shrink-0">AM</div>
                    <div>
                        <p class="text-sm text-text-primary dark:text-dark-text-primary">
                            <strong>Andi Maulana</strong> mengupdate status proyek <strong>Website Redesign</strong> menjadi 45%
                        </p>
                        <p class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1">30 menit yang lalu</p>
                    </div>
                </div>
                
                <!-- Activity 2 -->
                <div class="flex gap-3">
                    <div class="w-9 h-9 rounded-full bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 flex items-center justify-center font-semibold flex-shrink-0">RJ</div>
                    <div>
                        <p class="text-sm text-text-primary dark:text-dark-text-primary">
                            <strong>Rina Juliani</strong> mengupload file baru di proyek <strong>Mobile App Development</strong>
                        </p>
                        <p class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1">2 jam yang lalu</p>
                    </div>
                </div>
                
                <!-- Activity 3 -->
                <div class="flex gap-3">
                    <div class="w-9 h-9 rounded-full bg-secondary/10 dark:bg-dark-secondary/10 text-secondary dark:text-dark-secondary flex items-center justify-center font-semibold flex-shrink-0">TS</div>
                    <div>
                        <p class="text-sm text-text-primary dark:text-dark-text-primary">
                            <strong>Tono Sutrisno</strong> menyelesaikan tugas <strong>Mendesain UI homepage baru</strong>
                        </p>
                        <p class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1">5 jam yang lalu</p>
                    </div>
                </div>
                
                <!-- Activity 4 -->
                <div class="flex gap-3">
                    <div class="w-9 h-9 rounded-full bg-cyan-100 dark:bg-cyan-900 text-cyan-800 dark:text-cyan-200 flex items-center justify-center font-semibold flex-shrink-0">MP</div>
                    <div>
                        <p class="text-sm text-text-primary dark:text-dark-text-primary">
                            <strong>Maya Purnama</strong> menambahkan komentar pada tugas <strong>Review kode frontend</strong>
                        </p>
                        <p class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1">Kemarin, 16:45</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Deadline Panel -->
        <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft overflow-hidden">
            <div class="border-b border-border dark:border-dark-border px-5 py-4">
                <h2 class="font-semibold text-text-primary dark:text-dark-text-primary">Deadline Mendekat</h2>
            </div>
            <div class="p-5 space-y-4">
                <!-- Deadline 1 -->
                <div class="p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background cursor-pointer transition-colors">
                    <div class="font-medium text-text-primary dark:text-dark-text-primary">Presentasi ke klien</div>
                    <div class="text-sm text-text-secondary dark:text-dark-text-secondary mb-1">ProjectFlow Marketing</div>
                    <div class="flex items-center gap-1 text-xs text-danger">
                        <i class="far fa-clock"></i>
                        <span>Deadline: Besok, 10:00</span>
                    </div>
                </div>
                
                <!-- Deadline 2 -->
                <div class="p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background cursor-pointer transition-colors">
                    <div class="font-medium text-text-primary dark:text-dark-text-primary">Sprint review meeting</div>
                    <div class="text-sm text-text-secondary dark:text-dark-text-secondary mb-1">Website Redesign</div>
                    <div class="flex items-center gap-1 text-xs text-warning">
                        <i class="far fa-clock"></i>
                        <span>Deadline: 2 hari lagi</span>
                    </div>
                </div>
                
                <!-- Deadline 3 -->
                <div class="p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background cursor-pointer transition-colors">
                    <div class="font-medium text-text-primary dark:text-dark-text-primary">Pengumpulan laporan bulanan</div>
                    <div class="text-sm text-text-secondary dark:text-dark-text-secondary mb-1">Tim Manajemen</div>
                    <div class="flex items-center gap-1 text-xs text-text-secondary dark:text-dark-text-secondary">
                        <i class="far fa-clock"></i>
                        <span>Deadline: 3 hari lagi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                    @elseif ($role === 'dosen')
                        @include('dashboard.dosen')

                    @elseif ($role === 'mahasiswa')
                        @include('dashboard.mahasiswa')

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
                                <button @click="activeSection = 'projects'" 
                                        :class="{ 'border-b-2 border-primary text-primary': activeSection === 'projects' }"
                                        class="pb-3 px-1 font-medium">
                                    Proyek Saya
                                </button>
                                <button @click="activeSection = 'tasks'" 
                                        :class="{ 'border-b-2 border-primary text-primary': activeSection === 'tasks' }"
                                        class="pb-3 px-1 font-medium">
                                    Tugas Saya
                                </button>
                                <button @click="activeSection = 'invite'" 
                                        :class="{ 'border-b-2 border-primary text-primary': activeSection === 'invite' }"
                                        class="pb-3 px-1 font-medium">
                                    Kolaborasi
                                </button>
                            </div>

                            <!-- Projects Section -->
                            <div x-show="activeSection === 'projects'" x-transition>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Project Card -->
                                    <div class="border border-border dark:border-dark-border rounded-xl overflow-hidden hover:shadow-soft transition-shadow">
                                        <div class="p-5">
                                            <div class="flex justify-between items-start">
                                                <h3 class="font-bold text-lg">Sistem Manajemen Tugas</h3>
                                                <span class="px-2 py-1 text-xs rounded-full bg-success/10 text-success">Aktif</span>
                                            </div>
                                            <p class="text-text-secondary dark:text-dark-text-secondary mt-2 text-sm">Platform untuk manajemen tugas mahasiswa</p>
                                            
                                            <div class="mt-4">
                                                <div class="flex justify-between text-sm mb-1">
                                                    <span>Progress</span>
                                                    <span>60%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="bg-primary h-2 rounded-full" style="width: 60%"></div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 flex justify-between items-center">
                                                <div class="flex -space-x-2">
                                                    <div class="w-8 h-8 rounded-full bg-secondary flex items-center justify-center text-white text-xs">AM</div>
                                                    <div class="w-8 h-8 rounded-full bg-warning flex items-center justify-center text-white text-xs">BS</div>
                                                </div>
                                                <span class="text-xs text-text-secondary">Deadline: 15 Jun 2023</span>
                                            </div>
                                        </div>
                                        <div class="border-t border-border dark:border-dark-border px-5 py-3 bg-surface-50 dark:bg-dark-surface-50 flex justify-end space-x-2">
                                            <button class="text-primary hover:text-primary-hover text-sm">Detail</button>
                                            <button class="text-danger hover:text-danger/80 text-sm">Keluar</button>
                                        </div>
                                    </div>
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
                </div>
            </div>
        </div>
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
