<section x-data="{ role: '{{ old('role', $user->role) }}' }">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile information.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Nama -->
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                          :value="old('nama', $user->nama)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Role -->
        <div>
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" x-model="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dosen">Dosen</option>
                <option value="admin">Admin</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('role')" />
        </div>

        <!-- NIM -->
        <div x-show="role === 'mahasiswa'" x-cloak>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full"
                          :value="old('nim', $user->nim)" />
            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
        </div>

        <!-- NIDN -->
        <div x-show="role === 'dosen'" x-cloak>
            <x-input-label for="nidn" :value="__('NIDN')" />
            <x-text-input id="nidn" name="nidn" type="text" class="mt-1 block w-full"
                          :value="old('nidn', $user->nidn)" />
            <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
        </div>

        <!-- NIP -->
        <div x-show="role === 'dosen' || role === 'admin'" x-cloak>
            <x-input-label for="nip" :value="__('NIP')" />
            <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full"
                          :value="old('nip', $user->nip)" />
            <x-input-error class="mt-2" :messages="$errors->get('nip')" />
        </div>

        <!-- Program Studi -->
        <div x-show="role === 'mahasiswa'" x-cloak>
            <x-input-label for="kd_prodi" :value="__('Program Studi')" />
            <select id="kd_prodi" name="kd_prodi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Pilih Prodi --</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi->kd_prodi }}" {{ old('kd_prodi', $user->kd_prodi) == $prodi->kd_prodi ? 'selected' : '' }}>
                        {{ $prodi->kd_prodi }} - {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('kd_prodi')" />
        </div>

        <!-- Submit -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>