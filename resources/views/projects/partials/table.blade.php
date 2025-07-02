<section class="px-4 py-6 sm:px-6 lg:px-8 max-w-7xl w-auto mx-auto">
    <div class="mb-4">
        <a href="{{ route('projects.create') }}"
           class="inline-block bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary-hover transition">
            Tambah Data
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-soft bg-surface dark:bg-dark-surface">
        <table id="projects-table" class="min-w-full text-base text-left divide-y divide-border dark:divide-dark-border text-text-primary dark:text-dark-text-primary">
        <thead class="dark:bg-dark-muted text-md font-semibold uppercase tracking-wider text-text-secondary dark:text-dark-text-secondary">
            <thead>
                <tr>
                    <x-table-header>Judul</x-table-header>
                    <x-table-header>Deskripsi</x-table-header>
                    <x-table-header>Deadline</x-table-header>
                    <x-table-header>Program Studi</x-table-header>
                    <x-table-header>Mata Kuliah</x-table-header>
                    <x-table-header>Nim</x-table-header>
                    <x-table-header>Aksi</x-table-header>
              
                </tr>
            </thead>
    
        <tbody class="divide-y divide-border dark:divide-dark-border">
            <tbody
                @foreach ($projects as $item)
                @csrf
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                    <x-table-body>{{ $item->judul}}</x-table-body>
                    <x-table-body>{{ $item->deskripsi }}</x-table-body>
                    <x-table-body>{{ $item->deadline }}</x-table-body>
                    <x-table-body>{{ $item->kd_prodi}}</x-table-body>
                    <x-table-body>{{ $item->kd_matakuliah}}</x-table-body>
                    <x-table-body>{{ $item->mahasiswa_nim }}</x-table-body>
                    <x-table-body class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('projects.edit', $item->id) }}"
                                       class="text-blue-600 dark:text-blue-400 hover:underline">
                                       Edit
                                    </a>
    
                                    <button
                                        type="button"
                                        class="text-danger hover:underline"
                                        x-data
                                        x-on:click="$dispatch('open-modal', '{{ 'confirm-delete-' . $item->id }}')"
                                    >
                                        Hapus
                                    </button>
                                </div>
                            </x-table-body>
                        </tr>
    
                        <!-- Modal -->
                        <x-modal name="confirm-delete-{{ $item->id }}" :show="false" maxWidth="sm">
                            <div class="p-6 bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary">
                                <h2 class="text-lg font-semibold">
                                    Konfirmasi Hapus
                                </h2>
    
                                <p class="mt-2 text-sm text-text-secondary dark:text-dark-text-secondary">
                                    Apakah Anda yakin ingin menghapus tugas <strong>{{ $item->judul }}</strong>? Tindakan ini tidak dapat dibatalkan.
                                </p>
    
                                <div class="mt-6 flex justify-end gap-4">
                                    <button
                                        type="button"
                                        class="px-4 py-2 text-sm font-medium border rounded-md border-border dark:border-dark-border text-text-secondary dark:text-dark-text-secondary hover:bg-gray-100 dark:hover:bg-dark-hover"
                                        x-on:click="$dispatch('close-modal', '{{ 'confirm-delete-' . $item->id }}')"
                                    >
                                        Batal
                                    </button>
    
                                    <form method="POST" action="{{ route('projects.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="px-4 py-2 bg-danger text-white rounded-md text-sm hover:bg-red-700 transition"
                                        >
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </x-modal>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>