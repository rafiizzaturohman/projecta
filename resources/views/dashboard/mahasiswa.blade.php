<section>
    <div class="mb-8 flex justify-between items-start">
        <div>
            <h1 class="text-2xl font-bold">
                Hai, {{ auth()->user()->nama }}!
            </h1>
            <p class="text-text-secondary dark:text-dark-text-secondary mt-2">
                Lacak progres proyek dan tugas Anda
            </p>
        </div>
    </div>

    <!-- Progress Overview -->
    <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Project Progress -->
        <div
            class="bg-surface-50 dark:bg-dark-surface-50 p-4 rounded-xl border border-border dark:border-dark-border"
        >
            <h3 class="font-medium mb-3">Proyek Aktif</h3>
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 relative">
                    <svg class="w-full h-full" viewBox="0 0 36 36">
                        <path
                            d="M18 2.0845
                                              a 15.9155 15.9155 0 0 1 0 31.831
                                              a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#E2E8F0"
                            stroke-width="3"
                        />
                        <path
                            d="M18 2.0845
                                              a 15.9155 15.9155 0 0 1 0 31.831
                                              a 15.9155 15.9155 0 0 1 0 -31.831"
                            fill="none"
                            stroke="#4C9F9A"
                            stroke-width="3"
                            stroke-dasharray="75, 100"
                        />
                    </svg>
                    <span
                        class="absolute inset-0 flex items-center justify-center text-sm font-bold"
                    >
                        75%
                    </span>
                </div>
                <div>
                    <p class="text-2xl font-bold">3/4</p>
                    <p class="text-sm text-text-secondary">Proyek selesai</p>
                </div>
            </div>
        </div>

        <!-- Task Progress -->
        <div
            class="bg-surface-50 dark:bg-dark-surface-50 p-4 rounded-xl border border-border dark:border-dark-border"
        >
            <h3 class="font-medium mb-3">Tugas Mendekati Deadline</h3>
            <div class="space-y-2">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Analisis Requirements</span>
                        <span>2 hari lagi</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div
                            class="bg-warning h-2 rounded-full"
                            style="width: 85%"
                        ></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>UI Design</span>
                        <span>5 hari lagi</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div
                            class="bg-secondary h-2 rounded-full"
                            style="width: 60%"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Tabs -->
    <div x-data="{ activeSection: 'tasks' }" class="space-y-6">
        <!-- Navigation -->
        <div
            class="flex space-x-4 border-b border-border dark:border-dark-border"
        >
            <button
                @click="activeSection = 'tasks'"
                :class="{ 'border-b-2 border-primary text-primary': activeSection === 'tasks' }"
                class="pb-3 px-1 font-medium"
            >
                Tugas Saya
            </button>
            <button
                @click="activeSection = 'projects'"
                :class="{ 'border-b-2 border-primary text-primary': activeSection === 'projects' }"
                class="pb-3 px-1 font-medium"
            >
                Proyek Saya
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

                    <div
                        class="border border-border dark:border-dark-border rounded-xl overflow-hidden hover:shadow-soft transition-shadow"
                    >
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <h3 class="font-bold text-lg">
                                    {{ $project->judul }}
                                </h3>
                                <span
                                    class="px-2 py-1 text-xs rounded-full bg-success/10 text-success"
                                >
                                    {{ ucfirst($project->status) }}
                                </span>
                            </div>
                            <p
                                class="text-text-secondary dark:text-dark-text-secondary mt-2 text-sm"
                            >
                                {{ $project->deskripsi ?? 'Tidak ada deskripsi.' }}
                            </p>

                            <div class="mt-4">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Progress</span>
                                    <span>{{ $progress }}%</span>
                                </div>
                                <div
                                    class="w-full bg-gray-200 rounded-full h-2"
                                >
                                    <div
                                        class="bg-primary h-2 rounded-full transition-all duration-500"
                                        style="width: {{ $progress }}%"
                                    ></div>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-between items-center">
                                <div class="flex -space-x-2">
                                    <div
                                        class="w-8 h-8 rounded-full bg-secondary flex items-center justify-center text-white text-xs"
                                    >
                                        {{ \Illuminate\Support\Str::upper(substr($project->mahasiswa->nama ?? '??', 0, 2)) }}
                                    </div>
                                    {{-- Tambahkan user lain jika perlu --}}
                                </div>
                                <span class="text-xs text-text-secondary">
                                    Deadline:
                                    {{ \Carbon\Carbon::parse($project->deadline)->translatedFormat('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <div
                            class="px-5 py-3 bg-slate-200 dark:bg-slate-700 flex justify-end space-x-2"
                        >
                            <button
                                class="text-primary hover:text-primary-hover text-sm"
                            >
                                Detail
                            </button>
                        </div>
                    </div>
                @endforeach

                <!-- End Project Card -->
            </div>
        </div>

        <!-- Tasks Section -->
        <div
            x-show="activeSection === 'tasks'"
            x-transition
            style="display: none"
        >
            <div class="space-y-4">
                <!-- Task Item -->
                @foreach ($projects as $project)
                    @foreach ($project->tasks as $task)
                        <div
                            class="border border-border dark:border-dark-border rounded-lg space-y-4 p-6 hover:shadow-soft transition-shadow"
                        >
                            <div class="flex justify-between">
                                <div>
                                    <h4 class="font-medium">
                                        {{ $task->judul }}
                                    </h4>
                                    <p class="text-sm text-text-secondary">
                                        {{ $project->judul }}
                                    </p>
                                </div>

                                @php
                                    $statusColor = match ($task->status) {
                                        'belum' => 'px-2 py-3 rounded-xl text-sm font-semibold tracking-wide bg-red-800',
                                        'proses' => 'px-2 py-3 rounded-xl text-sm font-semibold tracking-wide bg-amber-500',
                                        'selesai' => 'px-2 py-3 rounded-xl text-sm font-semibold tracking-wide text-success bg-teal-800',
                                        default => 'bg-gray-100 text-gray-600',
                                    };
                                @endphp

                                <span class="{{ $statusColor }}">
                                    {{ ucfirst($task->status) }}
                                </span>

                                {{--
                                    @if ($task->status === 'belum')
                                    <span class="px-2 py-3 rounded-xl text-sm font-semibold tracking-wide bg-gray-200 text-gray-700">
                                    {{ ucfirst($task->status) }}
                                    </span>
                                    @elseif ($task->status === 'proses')
                                    <span class="px-2 py-3 rounded-xl text-sm font-semibold tracking-wide bg-warning/20 text-warning">
                                    {{ ucfirst($task->status) }}
                                    </span>
                                    @else
                                    <span class="px-2 py-3 rounded-xl text-sm font-semibold tracking-wide bg-success/20 text-success">
                                    {{ ucfirst($task->status) }}
                                    </span>
                                    @endif
                                --}}
                            </div>

                            <div class="mt-3 flex items-center justify-between">
                                <div
                                    class="flex items-center space-x-2 text-sm text-text-secondary"
                                >
                                    <svg
                                        class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        ></path>
                                    </svg>

                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp

                                    <span>
                                        {{ \Carbon\Carbon::parse($task->deadline)->translatedFormat('l, d M Y') }}
                                    </span>
                                </div>

                                <button
                                    class="px-4 py-2 rounded transition delay-100 text-primary bg-gray-200 hover:bg-primary hover:text-white dark:hover:bg-primary-hover dark:bg-slate-700 text-sm"
                                >
                                    Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endforeach

                <!-- End Task Item -->
            </div>
        </div>

        <!-- Invite Section -->
        {{--
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
        --}}
    </div>
</section>
