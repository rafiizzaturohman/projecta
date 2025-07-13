<section class="px-4 py-6 sm:px-6 lg:px-8 max-w-[1620px] w-auto mx-auto">
    <div class="mb-4">
        <a href="{{ route('matakuliahs.create') }}"
           class="inline-block bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary-hover transition">
            Tambah Data
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-soft bg-surface dark:bg-dark-surface">
        <table id="table"
               class="min-w-full text-base text-left divide-y divide-border dark:divide-dark-border text-text-primary dark:text-dark-text-primary">
            <thead class="dark:bg-dark-muted text-sm font-semibold uppercase tracking-wider text-text-secondary dark:text-dark-text-secondary">
                <tr>
                    <x-table-header>Kode Mata Kuliah</x-table-header>
                    <x-table-header>Nama</x-table-header>
                    <x-table-header>Dosen Pengampu</x-table-header>
                    <x-table-header>Aksi</x-table-header>
                </tr>
            </thead>

            <tbody>
                @include('matakuliah.partials.table-body')
            </tbody>
        </table>
    </div>
</section>