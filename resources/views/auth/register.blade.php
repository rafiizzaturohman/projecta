<x-guest-layout>
    <x-slot name="logo">
        <h1 class="text-xl font-bold">Registrasi User</h1>
    </x-slot>

    <form method="POST" action="{{ route('register') }}" x-data="{ role: '{{ old('role', 'admin') }}' }">
        @csrf

        <!-- Nama -->
        <div class="mt-4">
            <x-input-label for="nama" :value="'Nama'" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" value="{{ old('nama') }}" required autofocus />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="'Role'" />
            <select name="role" id="role" x-model="role" class="block w-full mt-1 border-gray-300 rounded">
                <option value="admin">Admin</option>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>


        <template x-if="role === 'admin'">
                <div class="mt-4">
                    <x-input-label for="nip" :value="'NIP'" />
                    <x-text-input id="nip" name="nip" type="text" class="block w-full" value="{{ old('nip') }}" required />
                    <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                </div>
        </template>

        <template x-if="role === 'dosen'">
                <div class="mt-4">
                    <x-input-label for="nidn" :value="'NIDN'" />
                    <x-text-input id="nidn" name="nidn" type="text" class="block w-full" value="{{ old('nidn') }}" required />
                    <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
                </div>
        </template>

        <!-- Field Tambahan untuk Mahasiswa -->
        <template x-if="role === 'mahasiswa'">
            <div>

                <!-- Prodi -->
                <div class="mt-4">
                    <x-input-label for="kd_prodi" :value="'Program Studi'" />
                    <select name="kd_prodi" id="kd_prodi" class="block w-full mt-1 border-gray-300 rounded">
                        <option value="">-- Pilih Prodi --</option>
                        @foreach ($prodis as $prodi)
                            <option value="{{ $prodi->kd_prodi }}" {{ old('kd_prodi') == $prodi->kd_prodi ? 'selected' : '' }}>
                                {{ $prodi->nama }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('kd_prodi')" class="mt-2" />
                </div>

                <!-- Tahun Masuk -->
                <div class="mt-4">
                    <x-input-label for="tahun_masuk" :value="'Tahun Masuk (2 Digit)'" />
                    <select name="tahun_masuk" id="tahun_masuk" class="block w-full mt-1 border-gray-300 rounded">
                        <option value="">-- Pilih Tahun --</option>
                        @for ($i = now()->year; $i >= 2015; $i--)
                            <option value="{{ substr($i, -2) }}" {{ old('tahun_masuk') == substr($i, -2) ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                    <x-input-error :messages="$errors->get('tahun_masuk')" class="mt-2" />
                </div>

                <!-- NIM -->
                <div class="mt-4">
                    <x-input-label for="nim" :value="'NIM'" />
                    <x-text-input id="nim" name="nim" type="text" class="block w-full" value="{{ old('nim') }}" required />
                    <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                </div>
            </div>
        </template>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Password'" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="'Konfirmasi Password'" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end mt-6">
            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
