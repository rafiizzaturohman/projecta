<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface shadow-soft rounded-2xl text-text-primary dark:text-dark-text-primary transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold mb-6">Tambah User Baru</h2>

        <form method="POST" action="{{ route('userManagement.store') }}"
              x-data="{ role: @js(old('role', 'mahasiswa')) }"
              x-init="$nextTick(() => { role = $refs.role.value })">
            @csrf

            <!-- Nama -->
            <div class="mb-4 space-y-2">
                <x-input-label for="nama" :value="'Nama'" />
                <x-text-input id="nama" name="nama" type="text" class="w-full" :value="old('nama')" required />
                <x-input-error :messages="$errors->get('nama')" class="mt-1" />
            </div>

            <!-- Email -->
            <div class="mb-4 space-y-2">
                <x-input-label for="email" :value="'Email'" />
                <x-text-input id="email" name="email" type="email" class="w-full" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-4 space-y-2">
                <x-input-label for="password" :value="'Password'" />
                <x-text-input id="password" name="password" type="password" class="w-full" required />
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4 space-y-2">
                <x-input-label for="password_confirmation" :value="'Konfirmasi Password'" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="w-full" required />
            </div>

            <!-- Role -->
            <div class="mb-4 space-y-2">
                <x-input-label for="role" :value="'Role'" />
                <select id="role" name="role"
                        x-model="role"
                        x-ref="role"
                        x-on:change="role = $event.target.value"
                        class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg">
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                    <option value="mahasiswa" {{ old('role', 'mahasiswa') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-1" />
            </div>

            <!-- NIM (mahasiswa) -->
            <div class="mb-4 space-y-2" x-show="role === 'mahasiswa'" x-cloak>
                <x-input-label for="nim" :value="'NIM'" />
                <x-text-input id="nim" name="nim" type="text" class="w-full" :value="old('nim')" />
                <x-input-error :messages="$errors->get('nim')" class="mt-1" />
            </div>

            <!-- NIDN (dosen) -->
            <div class="mb-4 space-y-2" x-show="role === 'dosen'" x-cloak>
                <x-input-label for="nidn" :value="'NIDN'" />
                <x-text-input id="nidn" name="nidn" type="text" class="w-full" :value="old('nidn')" />
                <x-input-error :messages="$errors->get('nidn')" class="mt-1" />
            </div>

            <!-- NIP (admin dan dosen) -->
            <div class="mb-4 space-y-2" x-show="role === 'admin' || role === 'dosen'" x-cloak>
                <x-input-label for="nip" :value="'NIP'" />
                <x-text-input id="nip" name="nip" type="text" class="w-full" :value="old('nip')" />
                <x-input-error :messages="$errors->get('nip')" class="mt-1" />
            </div>

            <!-- Prodi (mahasiswa) -->
            <div class="mb-4 space-y-2" x-show="role === 'mahasiswa'" x-cloak>
                <x-input-label for="kd_prodi" :value="'Program Studi'" />
                <select name="kd_prodi" id="kd_prodi"
                        class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach ($prodis as $prodi)
                        <option value="{{ $prodi->kd_prodi }}" {{ old('kd_prodi') == $prodi->kd_prodi ? 'selected' : '' }}>
                            {{ $prodi->kd_prodi }} - {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('kd_prodi')" class="mt-1" />
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route('userManagement.index') }}">
                    <x-secondary-button>Kembali</x-secondary-button>
                </a>
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

