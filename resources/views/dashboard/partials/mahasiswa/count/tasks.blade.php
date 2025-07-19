<section>
    <!-- Tugas Aktif -->
    <div
        class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-105 border border-gray-100 dark:border-gray-700 hover:border-primary dark:hover:border-primary transition-all duration-500 ease-in-out"
    >
        <div
            class="w-12 h-12 rounded-xl bg-success/10 text-success flex items-center justify-center text-xl"
        >
            <i class="fas fa-tasks"></i>
        </div>
        <div>
            <h3
                class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium"
            >
                Tugas Aktif
            </h3>
            <p
                class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary"
            >
                {{ $totalTasks }}
            </p>
            <div class="text-xs text-danger flex items-center gap-1">
                <i class="fas fa-clock"></i>
                {{ $nearDeadlineTasks }} deadline minggu ini
            </div>
        </div>
    </div>
</section>
