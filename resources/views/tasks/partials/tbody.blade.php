<section>
    @foreach ($tasks as $item)
        <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
            <x-table-body>{{ $item->judul }}</x-table-body>
            <x-table-body>{{ $item->deskripsi }}</x-table-body>

            @php
                \Carbon\Carbon::setLocale('id')
            @endphp
                        
            <x-table-body>{{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d M Y') }}</x-table-body>
            <x-table-body>{{ $item->user_nim }}</x-table-body>
            <x-table-body>{{ $item->project->judul }}</x-table-body>

            @php
                $statusColor = match($item->status) {
                    'belum' => 'text-center bg-red-600 text-white',
                    'proses' => 'text-center bg-yellow-600 text-white',
                    'selesai' => 'text-center bg-green-600 text-white',
                    default => 'bg-gray-100 text-gray-600'
                };
            @endphp

            <x-table-body class="{{ $statusColor }}">{{ ucfirst($item->status) }}</x-table-body> 
                     
            @if ($userRole === 'mahasiswa')    
                <x-table-body class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="{{ route('tasks.edit', $item->id) }}"
                            class="text-blue-600 dark:text-blue-400 hover:underline">
                            <i class="fa-solid fa-pen"></i>
                            <!-- Edit -->
                        </a>

                        <button
                            type="button"
                            class="text-danger hover:underline"
                            x-data
                            x-on:click="$dispatch('open-modal', '{{ 'confirm-delete-' . $item->id }}')">
                            <i class="fa-solid fa-trash"></i>
                            <!-- Hapus -->
                        </button>
                    </div>
                </x-table-body>
            @endif
        </tr>

                    <!-- Modal -->
        <x-modal name="confirm-delete-{{ $item->id }}" :show="false" maxWidth="sm">
            <div class="p-6 bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary">
                <h2 class="text-lg font-semibold">Konfirmasi Hapus</h2>

                <p class="mt-2 text-sm text-text-secondary dark:text-dark-text-secondary">
                    Apakah Anda yakin ingin menghapus tugas <strong>{{ $item->judul }}</strong>? Tindakan ini tidak dapat dibatalkan.
                </p>

                <div class="mt-6 flex justify-end gap-4">
                    <button type="button"
                        class="px-4 py-2 text-sm font-medium border rounded-md border-border dark:border-dark-border text-text-secondary dark:text-dark-text-secondary hover:bg-gray-100 dark:hover:bg-dark-hover"
                        x-on:click="$dispatch('close-modal', '{{ 'confirm-delete-' . $item->id }}')">
                        Batal
                    </button>
                    <form method="POST" action="{{ route('tasks.destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-danger text-white rounded-md text-sm hover:bg-red-700 transition">
                            Hapus
                        </button>
                </form>
                </div>
            </div>
        </x-modal>
    @endforeach
</section>