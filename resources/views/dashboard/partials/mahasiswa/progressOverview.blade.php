<section>
    <!-- Progress Overview -->
    <div class="mb-8 grid grid-cols-1 gap-6">
        <!-- Task Progress -->
        <div
            class="bg-surface-50 dark:bg-dark-surface-50 p-4 rounded-xl border border-border dark:border-dark-border"
        >
            <h3 class="font-medium mb-3">Tugas Mendekati Deadline</h3>
            <hr class="opacity-80 dark:opacity-10 my-2" />
            <div class="space-y-2">
                @if (is_iterable($nearDeadlineTasks) && count($nearDeadlineTasks) > 0)
                    @foreach ($nearDeadlineTasks as $task)
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span>{{ $task->judul }}</span>
                                <span>
                                    {{ $task->days_remaining }} hari lagi
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                @php
                                    $progress = max(100 - ($task->days_remaining / 7) * 100, 10);
                                @endphp

                                <div
                                    class="bg-warning h-2 rounded-full"
                                    style="width: {{ $progress }}%"
                                ></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p
                        class="text-sm text-text-secondary dark:text-dark-text-secondary"
                    >
                        Tidak ada tugas mendekati deadline
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>
