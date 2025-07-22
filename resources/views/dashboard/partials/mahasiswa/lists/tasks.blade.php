<section>
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
                        class="border border-border dark:border-dark-border rounded-xl space-y-4 p-6 hover:shadow-soft transition-all hover:scale-[1.02] duration-500"
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
                                    'belum' => 'px-4 py-3 rounded-lg text-sm font-semibold tracking-wide text-white bg-red-800',
                                    'proses' => 'px-4 py-3 rounded-lg text-sm font-semibold tracking-wide text-white bg-amber-500',
                                    'selesai' => 'px-4 py-3 rounded-lg text-sm font-semibold tracking-wide text-white bg-teal-700',
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
                                type="button"
                                onclick="window.location='{{ route('tasks.detail', $task->id) }}'"
                                class="px-4 py-2 rounded-md transition delay-100 text-primary bg-gray-200 hover:bg-primary hover:text-white dark:hover:bg-primary-hover dark:bg-slate-700 text-sm"
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
</section>
