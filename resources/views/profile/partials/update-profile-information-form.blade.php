<section x-data="{ role: '{{ old('role', $user->role) }}' }">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-2 text-sm text-text-secondary dark:text-dark-text-secondary">
            {{ __("Update your profile information.") }}
        </p>
    </header>

    @php
        $currentRole = auth()->user()->role;
    @endphp

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- Nama --}}
        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" name="nama" type="text"
                class="mt-1 block w-full rounded-lg border border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary shadow-soft px-4 py-2 transition duration-200"
                :value="old('nama', $user->nama)" required autofocus autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full rounded-lg border border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary shadow-soft px-4 py-2 transition duration-200"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        {{-- Role (Only editable by admin) --}}
        @php
            $isDisabled = $currentRole !== 'admin';
            $roleValue = old('role', $user->role);
        @endphp

        <div>
            <x-input-label for="role" :value="__('Role')" />

            @if ($isDisabled)
                {{-- 👇 Input hidden agar nilai tetap terkirim ke server --}}
                <input type="hidden" name="role" value="{{ $roleValue }}">
            @endif

            <select id="role" name="role" x-model="role"
                class="w-full rounded-lg border border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary shadow-soft px-4 py-2 transition duration-200"
                @if ($isDisabled) disabled @endif>
                
                <option value="mahasiswa" {{ $roleValue === 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                <option value="dosen" {{ $roleValue === 'dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="admin" {{ $roleValue === 'admin' ? 'selected' : '' }}>Admin</option>
                
            </select>

            <x-input-error class="mt-2" :messages="$errors->get('role')" />
        </div>



        {{-- NIM (Only shown for mahasiswa, editable only by admin) --}}
        <div x-show="role === 'mahasiswa'" x-cloak>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input
                id="nim"
                name="nim"
                type="text"
                :value="old('nim', $user->nim)"
            />
            <x-input-error class="mt-2" :messages="$errors->get('nim')" />
        </div>

        {{-- NIDN (Only shown for dosen) --}}
        <div x-show="role === 'dosen'" x-cloak>
            <x-input-label for="nidn" :value="__('NIDN')" />
            <x-text-input id="nidn" name="nidn" type="text" :value="old('nidn', $user->nidn)" />
            <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
        </div>

        {{-- NIP (Shown for dosen & admin) --}}
        <div x-show="role === 'dosen' || role === 'admin'" x-cloak>
            <x-input-label for="nip" :value="__('NIP')" />
            <x-text-input id="nip" name="nip" type="text" :value="old('nip', $user->nip)" />
            <x-input-error class="mt-2" :messages="$errors->get('nip')" />
        </div>

        {{-- Program Studi (Only for mahasiswa, editable only by admin) --}}
        @php
            $prodiReadonly = $currentRole !== 'admin';
        @endphp

        <div x-show="role === 'mahasiswa'" x-cloak>
            <x-input-label for="kd_prodi" :value="__('Program Studi')" />

            @if ($prodiReadonly)
                {{-- Agar tetap dikirim ke server --}}
                <input type="hidden" name="kd_prodi" value="{{ old('kd_prodi', $user->kd_prodi) }}">
            @endif

            <select id="kd_prodi" name="kd_prodi"
                class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg"
                {{ $prodiReadonly ? 'disabled aria-disabled=true' : '' }}>
                <option value="">-- Pilih Prodi --</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi->kd_prodi }}" {{ old('kd_prodi', $user->kd_prodi) == $prodi->kd_prodi ? 'selected' : '' }}>
                        {{ $prodi->kd_prodi }} - {{ $prodi->nama }}
                    </option>
                @endforeach
            </select>

            <x-input-error class="mt-2" :messages="$errors->get('kd_prodi')" />
        </div>


        {{-- Tombol --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm font-medium text-success dark:text-success">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
