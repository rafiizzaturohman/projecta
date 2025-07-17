<section class="px-4 py-6 sm:px-6 lg:px-8 max-w-[1620px] w-auto mx-auto">
    <div class="mb-4">
        <a
            href="{{ route('projects.create') }}"
            class="inline-block bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary-hover transition"
        >
            Tambah Data
        </a>
    </div>

    <!-- Wrapper agar tabel responsif di layar kecil -->
    <div
        class="overflow-x-auto rounded-lg shadow-soft bg-surface dark:bg-dark-surface"
    >
        <table
            id="projects-table"
            class="min-w-full text-base text-left divide-y divide-border dark:divide-dark-border text-text-primary dark:text-dark-text-primary"
        >
            <thead
                class="dark:bg-dark-muted text-sm font-semibold uppercase tracking-wider text-text-secondary dark:text-dark-text-secondary"
            >
                <tr>
                    <x-table-header>Judul</x-table-header>
                    <x-table-header>Deskripsi</x-table-header>
                    <x-table-header>Deadline</x-table-header>
                    <x-table-header>Program Studi</x-table-header>
                    <x-table-header>Mata Kuliah</x-table-header>
                    <x-table-header>NIM</x-table-header>

                    @php
                        $userRole = auth()->user()->role;
                    @endphp

                    @if ($userRole === 'mahasiswa')
                        <x-table-header>Aksi</x-table-header>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-border dark:divide-dark-border">
                @include('projects.partials.tbody', ['projects' => $projects, 'userRole' => $userRole])
            </tbody>
        </table>
    </div>
</section>
