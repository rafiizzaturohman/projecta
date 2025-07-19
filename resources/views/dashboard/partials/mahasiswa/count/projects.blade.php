<section>
    <!-- Total Proyek -->
    <div
        class="bg-surface dark:bg-dark-surface rounded-2xl shadow-soft p-5 flex items-start gap-4 hover:scale-105 border border-gray-100 dark:border-gray-700 hover:border-primary dark:hover:border-primary transition-all duration-500 ease-in-out"
    >
        <div
            class="w-12 h-12 rounded-xl bg-primary/10 dark:bg-dark-primary/10 text-primary dark:text-dark-primary flex items-center justify-center text-xl"
        >
            <i class="fas fa-project-diagram"></i>
        </div>
        <div>
            <h3
                class="text-sm text-text-secondary dark:text-dark-text-secondary font-medium"
            >
                Total Proyek
            </h3>
            <p
                class="text-2xl font-bold my-1 text-text-primary dark:text-dark-text-primary"
            >
                {{ $activeProjects }}
            </p>
            <div class="text-xs text-success flex items-center gap-1">
                <i class="fas fa-arrow-up"></i>
                @if ($recentProjects === 0)
                    Tidak ada proyek baru
                @else
                    {{ $recentProjects }} proyek baru minggu ini
                @endif
            </div>
        </div>
    </div>
</section>
