<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-4">
            Edit Data User
        </h2>

        <form method="POST" action="{{ route('userManagement.update', $user->id) }}"
              x-data="{ role: '{{ old('role', $user->role) }}' }">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-4">
                <x-input-label for="nama" value="Nama" />
                <x-text-input id="nama" name="nama" type="text" :value="old('nama', $user->nama)" required />
                <x-input-error :messages="$errors->get('nama')" class="mt-1" />
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            {{-- Role --}}
            <div class="mb-4">
                <x-input-label for="role" value="Role" />
                <select id="role" name="role" x-model="role"
                        class="w-full border border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg shadow-sm transition duration-200">
                    <option value="admin">Admin</option>
                    <option value="dosen">Dosen</option>
                    <option value="mahasiswa">Mahasiswa</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-1" />
            </div>

            {{-- NIM (mahasiswa) --}}
            <div class="mb-4" x-show="role === 'mahasiswa'" x-cloak>
                <x-input-label for="nim" value="NIM" />
                <x-text-input id="nim" name="nim" type="text" :value="old('nim', $user->nim)" />
                <x-input-error :messages="$errors->get('nim')" class="mt-1" />
            </div>

            {{-- NIDN (dosen) --}}
            <div class="mb-4" x-show="role === 'dosen'" x-cloak>
                <x-input-label for="nidn" value="NIDN" />
                <x-text-input id="nidn" name="nidn" type="text" :value="old('nidn', $user->nidn)" />
                <x-input-error :messages="$errors->get('nidn')" class="mt-1" />
            </div>

            {{-- NIP (admin dan dosen) --}}
            <div class="mb-4" x-show="role === 'admin' || role === 'dosen'" x-cloak>
                <x-input-label for="nip" value="NIP" />
                <x-text-input id="nip" name="nip" type="text" :value="old('nip', $user->nip)" />
                <x-input-error :messages="$errors->get('nip')" class="mt-1" />
            </div>

            {{-- Prodi (mahasiswa) --}}
            <div class="mb-4" x-show="role === 'mahasiswa'" x-cloak>
                <x-input-label for="kd_prodi" value="Program Studi" />
                <select name="kd_prodi" id="kd_prodi"
                        class="w-full border border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg shadow-sm transition duration-200">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach ($prodis as $prodi)
                        <option value="{{ $prodi->kd_prodi }}"
                            {{ old('kd_prodi', $user->kd_prodi) == $prodi->kd_prodi ? 'selected' : '' }}>
                            {{ $prodi->kd_prodi }} - {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('kd_prodi')" class="mt-1" />
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route('userManagement.index') }}">
                    <x-secondary-button>Kembali</x-secondary-button>
                </a>
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
