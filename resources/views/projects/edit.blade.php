<x-app-layout>
    <div class="p-6 bg-surface dark:bg-dark-surface rounded-lg shadow-soft transition-colors duration-300 max-w-7xl w-auto mx-auto">
        <h2 class="text-xl font-semibold text-text-primary dark:text-dark-text-primary mb-4">
            Edit Proyek
        </h2>

        @php
            $userNIM = auth()->user()->nim;
        @endphp

        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')
            {{-- Judul --}}
            <div class="mb-4">
                <x-input-label for="judul" value="Judul" />
                <x-text-input id="judul" name="judul" type="text"
                    :value="old('judul', $project->judul)" required />
                <x-input-error :messages="$errors->get('judul')" class="mt-1" />
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <x-input-label for="deskripsi" value="Deskripsi" />
                <x-text-input id="deskripsi" name="deskripsi" type="text"
                    :value="old('deskripsi', $project->deskripsi)" required />
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-1" />
            </div>
            
            {{-- Deadline --}}
            <div class="mb-4">
                <x-input-label for="deadline" value="Deadline" />
                <x-text-input id="deadline" name="deadline" type="date"
                    :value="old('deadline', $project->deadline)" required />
                <x-input-error :messages="$errors->get('deadline')" class="mt-1" />
            </div>
            
            {{-- Prodi --}}
            <div class="mb-4">
                <x-input-label for="kd_prodi" value="Prodi" />
                <select id="kd_prodi" name="kd_prodi"
                    class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg">
                    <option value="">-- Pilih Prodi --</option>
                    @foreach ($prodis as $item)
                        <option value="{{ $item->kd_prodi }}" {{ old('kd_prodi', $project->kd_prodi) == $item->kd_prodi ? 'selected' : '' }}>
                            {{ $item->kd_prodi }} - {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('kd_prodi')" class="mt-1" />
            </div>
            
            {{-- Matakuliah --}}
            <div class="mb-4">
                <x-input-label for="kd_matakuliah" value="Matakuliah" />
                <select id="kd_matakuliah" name="kd_matakuliah"
                    class="w-full border-border dark:border-dark-border bg-white dark:bg-dark-surface text-text-primary dark:text-dark-text-primary rounded-lg">
                    <option value="">-- Pilih Matakuliah --</option>
                    @foreach ($matakuliah as $item)
                        <option value="{{ $item->kd_matakuliah }}" {{ old('kd_matakuliah', $project->kd_matakuliah) == $item->kd_matakuliah ? 'selected' : '' }}>
                            {{ $item->kd_matakuliah }} - {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('kd_matakuliah')" class="mt-1" />
            </div>

            {{-- NIM Mahasiswa --}}
            <div class="mb-4">
                <x-input-label for="mahasiswa_nim" value="NIM Mahasiswa" />

                {{-- Readonly untuk UI --}}
                <x-text-input id="mahasiswa_nim_display" name="mahasiswa_nim_display" type="text"
                    :value="$project->mahasiswa_nim" disabled />

                {{-- Hidden untuk submission --}}
                <input type="hidden" name="mahasiswa_nim" value="{{ $project->mahasiswa_nim }}">

                <x-input-error :messages="$errors->get('mahasiswa_nim')" class="mt-1" />
            </div>

            {{-- Tombol --}}
            <div class="mt-6 flex justify-end gap-2">
                <a href="{{ route('projects.index') }}">
                    <x-secondary-button>Kembali</x-secondary-button>
                </a>
                <x-primary-button>Perbarui</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
