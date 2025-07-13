<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-4">
            Tambah Anggota Proyek
        </h2>

        <form method="POST" action="{{ route('project_members.store') }}">
            @csrf

            {{-- Pilih Proyek --}}
            <div class="mb-4">
                <x-input-label for="project_id" value="Proyek" />
                <select id="project_id" name="project_id"
                        class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg">
                    <option value="">-- Pilih Proyek --</option>
                    @foreach ($projects as $item)
                        <option value="{{ $item->id }}" {{ old('project_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->judul }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('project_id')" class="mt-1" />
            </div>

            {{-- Pilih User --}}
            <div class="mb-4">
                <x-input-label for="user_id" value="Nama Anggota" />
                <select id="user_id" name="user_id"
                        class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg">
                    <option value="">-- Pilih Member --</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}" {{ old('user_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nim ?? $item->nidn ?? $item->nip }} - {{ $item->nama }} - {{ ucfirst($item->role) }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_id')" class="mt-1" />
            </div>

            {{-- Pilih Peran --}}
            <div class="mb-4">
                <x-input-label for="role" value="Peran" />
                <select id="role" name="role"
                        class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg">
                    <option value="">-- Pilih Peran --</option>
                    <option value="ketua" {{ old('role') == 'ketua' ? 'selected' : '' }}>Ketua</option>
                    <option value="anggota" {{ old('role') == 'anggota' ? 'selected' : '' }}>Anggota</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-1" />
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route('project_members.index') }}">
                    <x-secondary-button>Kembali</x-secondary-button>
                </a>
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
