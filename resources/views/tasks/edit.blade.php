<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-xl shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-4">
            Edit Tugas
        </h2>

        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-4">
                <x-input-label for="judul" value="Judul" />
                <x-text-input id="judul" name="judul" type="text" class="w-full"
                    :value="old('judul', $task->judul)" required />
                <x-input-error :messages="$errors->get('judul')" class="mt-1" />
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <x-input-label for="deskripsi" value="Deskripsi" />
                <x-text-input id="deskripsi" name="deskripsi" type="text" class="w-full"
                    :value="old('deskripsi', $task->deskripsi)" />
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-1" />
            </div>

            {{-- Deadline --}}
            <div class="mb-4">
                <x-input-label for="deadline" value="Deadline" />
                <x-text-input id="deadline" name="deadline" type="date"
                    :value="old('deadline', $task->deadline)" required />
                <x-input-error :messages="$errors->get('deadline')" class="mt-1" />
            </div>

            {{-- NIM --}}
            <div class="mb-4">
                <x-input-label for="user_nim" value="NIM Mahasiswa" />
                <x-text-input id="user_nim" name="user_nim" type="text" class="w-full"
                    :value="old('user_nim', $task->user_nim)" />
                <x-input-error :messages="$errors->get('user_nim')" class="mt-1" />
            </div>

            {{-- Project --}}
            <div class="mb-4">
                <x-input-label for="project_id" value="Pilih Project" />
                <select id="project_id" name="project_id"
                    class="w-full border border-border dark:border-dark-border bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg shadow-sm transition">
                    <option value="">-- Pilih Project --</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}"
                            {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                            {{ $project->judul }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('project_id')" class="mt-1" />
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <x-input-label for="status" value="Status Tugas" />
                <select id="status" name="status"
                    class="w-full border border-border dark:border-dark-border bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg shadow-sm transition">
                    <option value="belum" {{ old('status', $task->status) == 'belum' ? 'selected' : '' }}>Belum</option>
                    <option value="proses" {{ old('status', $task->status) == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ old('status', $task->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-1" />
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route('tasks.index') }}">
                    <x-secondary-button>Kembali</x-secondary-button>
                </a>
                <x-primary-button>Simpan</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
