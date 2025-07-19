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

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        @include('dashboard.partials.mahasiswa.count.tasks')

        @include('dashboard.partials.mahasiswa.count.projects')
    </div>

    <!-- Progress Overview -->
    <div class="mb-8 grid grid-cols-1 gap-6">
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

        @include('dashboard.partials.mahasiswa.sections.projects')

        @include('dashboard.partials.mahasiswa.sections.tasks')
    </div>
</section>
