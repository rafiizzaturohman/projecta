<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-xl shadow-soft transition-colors duration-300 max-w-4xl mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-6">
            Tambah Tugas Baru
        </h2>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            @method('POST')

            {{-- Judul --}}
            <div class="mb-4">
                <x-input-label for="judul" value="Judul" />
                <x-text-input id="judul" name="judul" type="text" :value="old('judul')" required class="w-full" />
                <x-input-error :messages="$errors->get('judul')" class="mt-1" />
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <x-input-label for="deskripsi" value="Deskripsi" />
                <x-text-input id="deskripsi" name="deskripsi" type="text" :value="old('deskripsi')" required class="w-full" />
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-1" />
            </div>
            
            {{-- Deadline --}}
            <div class="mb-4">
                <x-input-label for="deadline" value="Deadline" />
                <x-text-input id="deadline" name="deadline" type="date" :value="old('deadline')" required class="w-full" />
                <x-input-error :messages="$errors->get('deadline')" class="mt-1" />
            </div>
            
            {{-- NIM User --}}
            <div class="mb-4">
                <x-input-label for="user_nim" value="NIM Mahasiswa" />
                <x-text-input id="user_nim" name="user_nim" type="text" :value="old('user_nim')" class="w-full" />
                <x-input-error :messages="$errors->get('user_nim')" class="mt-1" />
            </div>
            
            {{-- Project --}}
            <div class="mb-4">
                <x-input-label for="project_id" value="Project" />
                <select id="project_id" name="project_id"
                        class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg">
                    <option value="">-- Pilih Project --</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->judul }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('project_id')" class="mt-1" />
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('tasks.index') }}">
                    <x-secondary-button>Kembali</x-secondary-button>
                </a>
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
