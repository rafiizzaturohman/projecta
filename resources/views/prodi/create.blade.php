<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-4">
            Edit Data User
        </h2>

        <form method="POST" action="{{ route('projects.update', $user->id) }}">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-4">
                <x-input-label for="kd_prodi" value="Kd_Prodi" />
                <x-text-input id="kd_prodi" name="kd_prodi" type="text" :value="old('kd_prodi')" required />
                <x-input-error :messages="$errors->get('kd_prodi')" class="mt-1" />
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <x-input-label for="nama" value="Nama" />
                <x-text-input id="nama" name="nama" type="nama" :value="old('nama')" required />
                <x-input-error :messages="$errors->get('nama')" class="mt-1" />
            </div>
            

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route('taks.index') }}">
                    <x-secondary-button>Kembali</x-secondary-button>
                </a>
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
