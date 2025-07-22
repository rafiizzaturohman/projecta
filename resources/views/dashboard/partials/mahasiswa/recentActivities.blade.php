<section>
    <!-- Aktivitas Terkini Panel -->
    <div
        class="bg-surface dark:bg-dark-surface rounded-xl shadow-soft overflow-hidden"
    >
        <div class="border-b border-border dark:border-dark-border px-5 py-4">
            <h2
                class="font-semibold text-text-primary dark:text-dark-text-primary"
            >
                Aktivitas Terkini
            </h2>
        </div>

        <div class="p-5 space-y-4">
            @forelse ($recentActivities as $activity)
                <div class="flex gap-3">
                    <div
                        class="w-9 h-9 rounded-full {{ $activity['type'] === 'task' ? 'bg-success/10 text-success' : 'bg-primary/10 text-primary' }} dark:{{ $activity['type'] === 'task' ? 'bg-dark-success/10 text-dark-success' : 'bg-dark-primary/10 text-dark-primary' }} flex items-center justify-center font-semibold flex-shrink-0"
                    >
                        <i
                            class="fas {{ $activity['type'] === 'task' ? 'fa-tasks' : 'fa-project-diagram' }}"
                        ></i>
                    </div>
                    <div>
                        <p
                            class="text-sm text-text-primary dark:text-dark-text-primary"
                        >
                            <strong>{{ Auth::user()->name }}</strong>

                            @if ($activity['type'] === 'task')
                                Mengerjakan
                                <strong>{{ $activity['title'] }}</strong>
                            @else
                                Berpartisipasi dalam proyek
                                <strong>{{ $activity['title'] }}</strong>
                            @endif
                            <span class="text-xs text-muted">
                                ({{ ucfirst($activity['status']) }})
                            </span>
                        </p>
                        <p
                            class="text-xs text-text-secondary dark:text-dark-text-secondary mt-1"
                        >
                            {{ \Carbon\Carbon::parse($activity['updated_at'])->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @empty
                <div
                    class="text-sm text-text-secondary dark:text-dark-text-secondary"
                >
                    Tidak ada aktivitas terbaru.
                </div>
            @endforelse
        </div>
    </div>
</section>
