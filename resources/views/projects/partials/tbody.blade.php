@foreach ($projects as $item)
    <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
        <x-table-body>{{ $item->judul }}</x-table-body>
        <x-table-body>{{ $item->deskripsi }}</x-table-body>
        <x-table-body>{{ $item->deadline }}</x-table-body>
        <x-table-body>{{ $item->kd_prodi }}</x-table-body>
        <x-table-body>{{ $item->kd_matakuliah }}</x-table-body>
        <x-table-body>{{ $item->mahasiswa_nim }}</x-table-body>
        @if ($userRole === 'mahasiswa')
            <x-table-body class="px-6 py-4">
                <div class="flex gap-2">
                    <a
                        href="{{ route('projects.edit', $item->id) }}"
                        class="text-blue-600 dark:text-blue-400 hover:underline"
                    >
                        <i class="fa-solid fa-pen"></i>
                        {{-- Edit --}}
                    </a>

                    <button
                        type="button"
                        class="text-danger hover:underline"
                        x-data
                        x-on:click="$dispatch('open-modal', '{{ 'confirm-delete-' . $item->id }}')"
                    >
                        <i class="fa-solid fa-trash"></i>
                        {{-- Hapus --}}
                    </button>
                </div>
            </x-table-body>
        @endif
    </tr>

    <!-- Modal -->
    <x-modal name="confirm-delete-{{ $item->id }}" :show="false" maxWidth="sm">
        <div
            class="p-6 bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary"
        >
            <h2 class="text-lg font-semibold">Konfirmasi Hapus</h2>
            <p
                class="mt-2 text-sm text-text-secondary dark:text-dark-text-secondary"
            >
                Apakah Anda yakin ingin menghapus proyek
                <strong>{{ $item->judul }}</strong>
                ? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="mt-6 flex justify-end gap-4">
                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium border rounded-md border-border dark:border-dark-border text-text-secondary dark:text-dark-text-secondary hover:bg-gray-100 dark:hover:bg-dark-hover"
                    x-on:click="$dispatch('close-modal', '{{ 'confirm-delete-' . $item->id }}')"
                >
                    Batal
                </button>

                <form
                    method="POST"
                    action="{{ route('projects.destroy', $item->id) }}"
                >
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
@endforeach
