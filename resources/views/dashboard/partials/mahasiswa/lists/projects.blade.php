<section>
    <!-- Projects Section -->
    <div x-show="activeSection === 'projects'" x-transition>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Project Card -->
            @foreach ($projects as $project)
                @php
                    $total = $project->total_tasks;
                    $done = $project->completed_tasks;
                    $progress = $total > 0 ? round(($done / $total) * 100) : 0;
                @endphp

                <div
                    class="border border-border dark:border-dark-border rounded-xl overflow-hidden hover:shadow-soft transition-all hover:scale-101"
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
                            <div class="w-full bg-gray-200 rounded-full h-2">
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
</section>
