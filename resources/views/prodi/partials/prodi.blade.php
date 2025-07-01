<section class="space-y-6">
        <table id="prodi-table">
            <thead>
                <tr>
                    <th>Kd_Prodi</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prodi as $item)
                @csrf
                <tr>
                    <td>{{ $item->kd_prodi }}</td>
                    <td>{{ $item->nama }}</td>
                    <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('prodi.edit', $item->id) }}"
                                       class="text-blue-600 dark:text-blue-400 hover:underline">Edit</a>
    
                                    <button
                                        type="button"
                                        class="text-danger hover:underline"
                                        x-data
                                        x-on:click="$dispatch('open-modal', '{{ 'confirm-delete-' . $item->id }}')"
                                    >
                                        Hapus
                                    </button>
                                </div>
                            </td>
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
    
                                    <form method="POST" action="{{ route('prodi.destroy', $item->id) }}">
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
</section>