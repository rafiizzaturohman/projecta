<section class="px-4 py-6 sm:px-6 lg:px-8 max-w-7xl w-auto mx-auto">
    <div class="mb-4">
        <a href="{{ route('userManagement.create') }}"
           class="inline-block bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary-hover transition">
            Tambah Data
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-soft bg-surface dark:bg-dark-surface">
        <table id="table"
            class="min-w-full text-base text-left divide-y divide-border dark:divide-dark-border text-text-primary dark:text-dark-text-primary">
            <thead class="dark:bg-dark-muted text-md font-semibold uppercase tracking-wider text-text-secondary dark:text-dark-text-secondary">
                <tr>
                    <x-table-header for="Nama" value="Nama" />
                    <x-table-header for="Email" value="Email" />
                    <x-table-header for="Role" value="Role" />
                    <x-table-header for="Aksi" value="Aksi" />
                </tr>
            </thead>
    
            <tbody class="divide-y divide-border dark:divide-dark-border">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <x-table-body>{{ $user->nama }}</x-table-body>
                        <x-table-body>{{ $user->email }}</x-table-body>
                        <x-table-body>
                            <span class="inline-block px-2 py-0.5 text-xs rounded-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
                                {{ ucfirst($user->role) }}
                            </span>
                        </x-table-body>
                        <x-table-body>
                            <div class="flex gap-4">
                                <a href="{{ route('userManagement.edit', $user->id) }}"
                                    class="text-blue-600 dark:text-blue-400 hover:underline">
                                <i class="fa-solid fa-pen"></i>
                                    Edit
                                </a>
    
                                <button
                                    type="button"
                                    class="text-danger hover:underline"
                                    x-data
                                    x-on:click="$dispatch('open-modal', '{{ 'confirm-delete-' . $user->id }}')"
                                >
                                <i class="fa-solid fa-trash"></i>
                                    Hapus
                                </button>
                            </div>
                        </x-table-body>
                    </tr>
    
                        <!-- Modal -->
                    <x-modal name="confirm-delete-{{ $user->id }}" :show="false" maxWidth="sm">
                        <div class="p-6 bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary">
                            <h2 class="text-lg font-semibold">
                                Konfirmasi Hapus
                            </h2>
    
                            <p class="mt-2 text-sm text-text-secondary dark:text-dark-text-secondary">
                                Apakah Anda yakin ingin menghapus user <strong>{{ $user->nama }}</strong>? Tindakan ini tidak dapat dibatalkan.
                            </p>
    
                            <div class="mt-6 flex justify-end gap-4">
                                <button
                                    type="button"
                                    class="px-4 py-2 text-sm font-medium border rounded-md border-border dark:border-dark-border text-text-secondary dark:text-dark-text-secondary hover:bg-gray-100 dark:hover:bg-dark-hover"
                                    x-on:click="$dispatch('close-modal', '{{ 'confirm-delete-' . $user->id }}')"
                                >
                                    Batal
                                </button>
    
                                <form method="POST" action="{{ route('userManagement.destroy', $user->id) }}">
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
            </tbody>
        </table>
    </div>
</section>
