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

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
        @include('dashboard.partials.mahasiswa.count.projects')

        @include('dashboard.partials.mahasiswa.count.tasks')

        @include('dashboard.partials.mahasiswa.count.completed')
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-8">
        <div>
            @include('dashboard.partials.mahasiswa.progressOverview')

            <!-- Main Content Tabs -->
            <div x-data="{ activeSection: 'tasks' }" class="space-y-6">
                <!-- Navigation -->
                <div
                    class="flex flex-row justify-between border-b border-border dark:border-dark-border"
                >
                    <div class="flex space-x-4">
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

                    <div>
                        <x-text-input
                            type="text"
                            class="border-none"
                            :placeholder="_('Search here...')"
                        />
                    </div>
                </div>

                @include('dashboard.partials.mahasiswa.lists.projects')

                @include('dashboard.partials.mahasiswa.lists.tasks')
            </div>
        </div>

        <div>
            @include('dashboard.partials.mahasiswa.recentActivities')
        </div>
    </div>
</section>
