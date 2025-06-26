<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit User</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf @method('PUT')

            <div class="mb-4">
                <x-input-label for="nama" :value="'Nama'" />
                <x-text-input name="nama" id="nama" value="{{ old('nama', $user->nama) }}" class="w-full" required />
                <x-input-error :messages="$errors->get('nama')" class="mt-1" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="'Email'" />
                <x-text-input name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full" required />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div class="mb-4">
                <x-input-label for="role" :value="'Role'" />
                <select name="role" id="role" class="w-full">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                    <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-1" />
            </div>

            <div class="mb-4">
                <x-input-label for="nim" :value="'NIM'" />
                <x-text-input name="nim" id="nim" value="{{ old('nim', $user->nim) }}" class="w-full" />
                <x-input-error :messages="$errors->get('nim')" class="mt-1" />
            </div>

            <div class="mb-4">
                <x-input-label for="nidn" :value="'NIDN'" />
                <x-text-input name="nidn" id="nidn" value="{{ old('nidn', $user->nidn) }}" class="w-full" />
                <x-input-error :messages="$errors->get('nidn')" class="mt-1" />
            </div>

            <div class="mb-4">
                <x-input-label for="nip" :value="'NIP'" />
                <x-text-input name="nip" id="nip" value="{{ old('nip', $user->nip) }}" class="w-full" />
                <x-input-error :messages="$errors->get('nip')" class="mt-1" />
            </div>

            <div class="mb-4">
                <x-input-label for="kd_prodi" :value="'Program Studi'" />
                <select name="kd_prodi" id="kd_prodi" class="w-full">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach ($prodis as $prodi)
                        <option value="{{ $prodi->kd_prodi }}" {{ $user->kd_prodi == $prodi->kd_prodi ? 'selected' : '' }}>
                            {{ $prodi->nama }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('kd_prodi')" class="mt-1" />
            </div>

            <div class="mt-6">
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
