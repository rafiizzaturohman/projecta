@foreach ($matakuliahs as $matkul)
    <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
        <x-table-body>{{ $matkul->kd_matakuliah }}</x-table-body>
        <x-table-body>{{ $matkul->nama }}</x-table-body>
        <x-table-body>{{ $matkul->semester }}</x-table-body>
        <x-table-body>{{ $matkul->sks }}</x-table-body>
        <x-table-body>{{ $matkul->dosen->nama}}</x-table-body>
        <x-table-body>
            <div class="flex gap-4">
                <a href="{{ route('matakuliahs.edit', $matkul->id) }}"
                    class="text-blue-600 dark:text-blue-400 hover:underline">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>

                <button type="button"
                    class="text-danger hover:underline"
                    x-data
                    x-on:click="$dispatch('open-modal', '{{ 'confirm-delete-' . $matkul->id }}')">
                    <i class="fa-solid fa-trash"></i> Hapus
                </button>
            </div>
        </x-table-body>
    </tr>
    
                        <!-- Modal -->
    <x-modal name="confirm-delete-{{ $matkul->id }}" :show="false" maxWidth="sm">
        <div class="p-6 bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary">
            <h2 class="text-lg font-semibold">
                Konfirmasi Hapus
            </h2>
    
            <p class="mt-2 text-sm text-text-secondary dark:text-dark-text-secondary">
                Apakah Anda yakin ingin menghapus matkul <strong>{{ $matkul->nama }}</strong>? Tindakan ini tidak dapat dibatalkan.
            </p>
    
            <div class="mt-6 flex justify-end gap-4">
                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium border rounded-md border-border dark:border-dark-border text-text-secondary dark:text-dark-text-secondary hover:bg-gray-100 dark:hover:bg-dark-hover"
                    x-on:click="$dispatch('close-modal', '{{ 'confirm-delete-' . $matkul->id }}')"
                    >
                    Batal
                </button>
    
                <form method="POST" action="{{ route('matakuliahs.destroy', $matkul->id) }}">
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