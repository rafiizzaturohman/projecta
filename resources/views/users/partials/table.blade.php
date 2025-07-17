<section class="px-4 py-6 sm:px-6 lg:px-8 max-w-[1620px] w-auto mx-auto">
    <div class="mb-4">
        <div class="flex flex-row justify-between">
            {{-- TOMBOL TAMBAH DATA USER --}}
            <div>
                <a href="{{ route('userManagement.create') }}"
                   class="inline-block bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary-hover transition">
                    Tambah Data
                </a>
            </div>

            <div>
                @include('users.partials.search')
            </div>
        </div>
    </div>

    <div class="overflow-x-auto rounded-lg shadow-soft bg-surface dark:bg-dark-surface">
        <table id="table"
            class="min-w-full text-base text-left divide-y divide-border dark:divide-dark-border text-text-primary dark:text-dark-text-primary">
            <thead class="dark:bg-dark-muted text-md font-semibold uppercase tracking-wider text-text-secondary dark:text-dark-text-secondary">
                <tr>
                    <x-table-header for="NIM/NIDN/NIP" value="NIM/NIDN/NIP" />
                    <x-table-header for="Nama" value="Nama" />
                    <x-table-header for="Email" value="Email" />
                    <x-table-header for="Role" value="Role" />
                    <x-table-header for="Aksi" value="Aksi" />
                </tr>
            </thead>
    
            <tbody id="userTable-tbody" class="divide-y divide-border dark:divide-dark-border">
                @include('users.partials.tbody', ['users' => $users])
            </tbody>
        </table>
    </div>
</section>
