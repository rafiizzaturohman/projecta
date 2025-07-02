<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-4">
            Edit Data User
        </h2>

        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-input-label for="judul" value="Judul" />
                <x-text-input id="judul" name="judul" type="text" :value="old('judul', $project->judul)" required />
                <x-input-error :messages="$errors->get('judul')" class="mt-1" />
            </div>

            <div class="mb-4">
                <x-input-label for="deskripsi" value="Deskripsi" />
                <x-text-input id="deskripsi" name="deskripsi" type="deskripsi" :value="old('deskripsi', $project->deskripsi)" required />
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-1" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="kd_prodi" value="Kd_Prodi" />
                <x-text-input id="kd_prodi" name="kd_prodi" type="kd_prodi" :value="old('kd_prodi', $project->kd_prodi)" required />
                <x-input-error :messages="$errors->get('kd_prodi')" class="mt-1" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="kd_matakuliah" value="Kd_Matakuliah" />
                <x-text-input id="kd_matakuliah" name="kd_matakuliah" type="kd_matakuliah" :value="old('kd_matakuliah', $project->kd_matakuliah)" required />
                <x-input-error :messages="$errors->get('kd_matakuliah')" class="mt-1" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="mahasiswa_nim" value="Mahasiswa_Nim" />
                <x-text-input id="mahasiswa_nim" name="mahasiswa_nim" type="mahasiswa_nim" :value="old('mahasiswa_nim', $project->mahasiswa_nim)" required />
                <x-input-error :messages="$errors->get('mahasiswa_nim')" class="mt-1" />
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route('projects.index') }}">
                    <x-secondary-button>Kembali</x-secondary-button>
                </a>
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
