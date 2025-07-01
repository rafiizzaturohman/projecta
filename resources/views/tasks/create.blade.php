<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-4">
            Edit Data User
        </h2>

        <form method="POST" action="{{ route('taks.update', $user->id) }}">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-4">
                <x-input-label for="judul" value="Judul" />
                <x-text-input id="judul" name="judul" type="text" :value="old('judul')" required />
                <x-input-error :messages="$errors->get('judul')" class="mt-1" />
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <x-input-label for="deskripsi" value="Deskripsi" />
                <x-text-input id="deskripsi" name="deskripsi" type="deskripsi" :value="old('deskripsi')" required />
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-1" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="deadline" value="Deadline" />
                <x-text-input id="deadline" name="deadline" type="deadline" :value="old('deadline')" required />
                <x-input-error :messages="$errors->get('deadline')" class="mt-1" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="user_nim" value="User_Nim" />
                <x-text-input id="user_nim" name="user_nim" type="user_nim" :value="old('user_nim')" required />
                <x-input-error :messages="$errors->get('user_nim')" class="mt-1" />
            </div>
            
            <div class="mb-4">
                <x-input-label for="project_id" value="Deadline" />
                <x-text-input id="project_id" name="project_id" type="project_id" :value="old('project_id')" required />
                <x-input-error :messages="$errors->get('project_id')" class="mt-1" />
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
