<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                <!-- Total Mata Kuliah -->
                <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-101 transition-transform">
                    <div class="w-12 h-12 rounded-xl bg-primary/10 dark:bg-dark-primary/10 text-primary dark:text-dark-primary flex items-center justify-center text-xl">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div>
                        <h3 class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium">Total Mata Kuliah</h3>
                        <p class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary">5</p>
                        <div class="text-xs text-success flex items-center gap-1">
                            <i class="fas fa-arrow-up"></i>
                            1 baru semester ini
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
                        <p class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary">12</p>
                        <div class="text-xs text-danger flex items-center gap-1">
                            <i class="fas fa-arrow-down"></i>
                            3 deadline minggu ini
                        </div>
                    </div>
                </div>
                
                <!-- Total Mahasiswa -->
                <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-101 transition-transform">
                    <div class="w-12 h-12 rounded-xl bg-secondary/10 dark:bg-dark-secondary/10 text-secondary dark:text-dark-secondary flex items-center justify-center text-xl">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h3 class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium">Total Mahasiswa</h3>
                        <p class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary">150</p>
                        <div class="text-xs text-info flex items-center gap-1">
                            <i class="fas fa-arrow-up"></i>
                            15 baru semester ini
                        </div>
                    </div>
                </div>
                
                <!-- Tugas Belum Dinilai -->
                <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-101 transition-transform">
                    <div class="w-12 h-12 rounded-xl bg-danger/10 text-danger flex items-center justify-center text-xl">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div>
                        <h3 class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium">Tugas Belum Dinilai</h3>
                        <p class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary">24</p>
                        <div class="text-xs text-warning flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i>
                            Perlu perhatian
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column (2/3 width) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Tugas Terkini Panel -->
                    <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft overflow-hidden">
                        <div class="border-b border-border dark:border-dark-border px-5 py-4 flex justify-between items-center">
                            <h2 class="font-semibold text-text-primary dark:text-dark-text-primary">Tugas Terkini</h2>
                            <button class="text-sm text-primary dark:text-dark-primary font-medium hover:text-primary-hover dark:hover:text-dark-primary-hover transition-colors">
                                Lihat Semua
                            </button>
                        </div>
                        <div class="p-5 space-y-4">
                            <!-- Tugas 1 -->
                            <div class="border border-border dark:border-dark-border rounded-xl p-4 hover:border-primary dark:hover:border-dark-primary hover:shadow-soft transition-all cursor-pointer hover:scale-[1.005]">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="font-semibold text-text-primary dark:text-dark-text-primary">Tugas 1 - Pemrograman Web</h3>
                                    <span class="bg-success/10 text-success text-xs px-2.5 py-0.5 rounded-full">Terkumpul 45/50</span>
                                </div>
                                <div class="flex gap-4 mb-4">
                                    <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>Deadline: 15 Okt 2023</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                                        <i class="far fa-clock"></i>
                                        <span>90% Pengumpulan</span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="flex justify-between text-sm text-text-secondary dark:text-dark-text-secondary mb-1">
                                        <span>Progress Pengumpulan</span>
                                        <span>90%</span>
                                    </div>
                                    <div class="w-full bg-border dark:bg-dark-border rounded-full h-1.5">
                                        <div class="bg-primary dark:bg-dark-primary h-1.5 rounded-full" style="width: 90%"></div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                                        <i class="fas fa-book"></i>
                                        <span>Pemrograman Web</span>
                                    </div>
                                    <button class="px-3 py-1 rounded-lg bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover transition-colors duration-200 text-sm">
                                        Nilai Tugas
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Tugas 2 -->
                            <div class="border border-border dark:border-dark-border rounded-xl p-4 hover:border-primary dark:hover:border-dark-primary hover:shadow-soft transition-all cursor-pointer hover:scale-[1.005]">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="font-semibold text-text-primary dark:text-dark-text-primary">Tugas 2 - Basis Data</h3>
                                    <span class="bg-warning/10 text-warning text-xs px-2.5 py-0.5 rounded-full">Terkumpul 38/50</span>
                                </div>
                                <div class="flex gap-4 mb-4">
                                    <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>Deadline: 20 Okt 2023</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                                        <i class="far fa-clock"></i>
                                        <span>76% Pengumpulan</span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="flex justify-between text-sm text-text-secondary dark:text-dark-text-secondary mb-1">
                                        <span>Progress Pengumpulan</span>
                                        <span>76%</span>
                                    </div>
                                    <div class="w-full bg-border dark:bg-dark-border rounded-full h-1.5">
                                        <div class="bg-primary dark:bg-dark-primary h-1.5 rounded-full" style="width: 76%"></div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-1 text-sm text-text-secondary dark:text-dark-text-secondary">
                                        <i class="fas fa-book"></i>
                                        <span>Basis Data</span>
                                    </div>
                                    <button class="px-3 py-1 rounded-lg bg-primary dark:bg-dark-primary text-white hover:bg-primary-hover dark:hover:bg-dark-primary-hover transition-colors duration-200 text-sm">
                                        Nilai Tugas
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Project Panel -->
                    <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft overflow-hidden">
                        <div class="border-b border-border dark:border-dark-border px-5 py-4 flex justify-between items-center">
                            <h2 class="font-semibold text-text-primary dark:text-dark-text-primary">Project Mahasiswa</h2>
                            <button class="text-sm text-primary dark:text-dark-primary font-medium hover:text-primary-hover dark:hover:text-dark-primary-hover transition-colors">
                                Lihat Semua
                            </button>
                        </div>
                        <div class="p-5 space-y-3">
                            <!-- Project 1 -->
                            <div class="flex items-center p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background transition-colors border border-border dark:border-dark-border">
                                <div class="w-10 h-10 rounded-lg bg-primary/10 dark:bg-dark-primary/10 text-primary dark:text-dark-primary flex items-center justify-center mr-3">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium text-text-primary dark:text-dark-text-primary">Sistem Informasi Akademik</div>
                                    <div class="text-sm text-text-secondary dark:text-dark-text-secondary">Kelompok 1 - Pemrograman Web</div>
                                </div>
                                <div class="text-xs bg-success/10 text-success px-2.5 py-0.5 rounded-full">Terkumpul</div>
                            </div>
                            
                            <!-- Project 2 -->
                            <div class="flex items-center p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background transition-colors border border-border dark:border-dark-border">
                                <div class="w-10 h-10 rounded-lg bg-secondary/10 dark:bg-dark-secondary/10 text-secondary dark:text-dark-secondary flex items-center justify-center mr-3">
                                    <i class="fas fa-database"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium text-text-primary dark:text-dark-text-primary">Perancangan Database</div>
                                    <div class="text-sm text-text-secondary dark:text-dark-text-secondary">Kelompok 3 - Basis Data</div>
                                </div>
                                <div class="text-xs bg-warning/10 text-warning px-2.5 py-0.5 rounded-full">Dalam Proses</div>
                            </div>
                            
                            <!-- Project 3 -->
                            <div class="flex items-center p-3 rounded-lg hover:bg-background dark:hover:bg-dark-background transition-colors border border-border dark:border-dark-border">
                                <div class="w-10 h-10 rounded-lg bg-info/10 text-info flex items-center justify-center mr-3">
                                    <i class="fas fa-robot"></i>
                                </div>
                                <div class="flex-1">
                                    <div class="font-medium text-text-primary dark:text-dark-text-primary">Algoritma Pencarian</div>
                                    <div class="text-sm text-text-secondary dark:text-dark-text-secondary">Kelompok 5 - Kecerdasan Buatan</div>
                                </div>
                                <div class="text-xs bg-danger/10 text-danger px-2.5 py-0.5 rounded-full">Belum Dikumpulkan</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column (1/3 width) -->
                <div class="space-y-6">
                    <!-- Aktivitas Terkini Panel -->
                    <div class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft overflow-hidden">
                        <div class="border-b border-border dark:border-dark-border px-5 py-4">
                            <h2 class="font-semibold text-text-primary dark:text-dark-text-primary">Aktivitas Terkini</h2>
                        </div>
                        <div class="p-5 space-y-4">
                            <!-- Aktivitas 1 -->
                            <div class="flex gap-3">
                                <div class="w-9 h-9 rounded-full bg-primary/10 dark:bg-dark-primary/10 text-primary dark:text-dark-primary flex items-center justify-center font-semibold flex-shrink-0">
                                    <i class="fas fa-user-graduate"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-text-primary dark:text-dark-text-primary">
                                        <strong>Andi Pratama</strong> mengumpulkan <strong>Tugas 1 - Pemrograman Web</strong>
                                    </p>
                                    <p class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1">30 menit yang lalu</p>
                                </div>
                            </div>
                            
                            <!-- Aktivitas 2 -->
                            <div class="flex gap-3">
                                <div class="w-9 h-9 rounded-full bg-success/10 text-success flex items-center justify-center font-semibold flex-shrink-0">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-text-primary dark:text-dark-text-primary">
                                        Anda menilai tugas <strong>Budi Santoso</strong> untuk <strong>Tugas 2 - Basis Data</strong>
                                    </p>
                                    <p class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1">2 jam yang lalu</p>
                                </div>
                            </div>
                            
                            <!-- Aktivitas 3 -->
                            <div class="flex gap-3">
                                <div class="w-9 h-9 rounded-full bg-secondary/10 dark:bg-dark-secondary/10 text-secondary dark:text-dark-secondary flex items-center justify-center font-semibold flex-shrink-0">
                                    <i class="fas fa-comment-dots"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-text-primary dark:text-dark-text-primary">
                                        <strong>Siti Rahayu</strong> mengirim pertanyaan tentang <strong>Project Akhir</strong>
                                    </p>
                                    <p class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1">5 jam yang lalu</p>
                                </div>
                            </div>
                            
                            <!-- Aktivitas 4 -->
                            <div class="flex gap-3">
                                <div class="w-9 h-9 rounded-full bg-info/10 text-info flex items-center justify-center font-semibold flex-shrink-0">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-text-primary dark:text-dark-text-primary">
                                        <strong>Kelompok 4</strong> mengumpulkan revisi <strong>Project Basis Data</strong>
                                    </p>
                                    <p class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1">Kemarin, 16:45</p>
                                </div>
                            </div>
                        </div>
                    </div>