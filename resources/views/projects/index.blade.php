<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @include('projects.partials.project')
                </div>
            </div>
        </div>
    </div>

   <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            <!-- Daftar Project -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($projects as $project)
                    @include('projects.partials.project', ['project' => $project])
                @endforeach
            </div>
        </div>
    </div>

<!-- Contoh Card Proyek dengan Tombol Edit -->
<div class="border border-border dark:border-dark-border rounded-xl overflow-hidden hover:shadow-soft transition-shadow">
    <div class="p-5">
        <div class="flex justify-between items-start">
            <h3 class="font-bold text-lg">Sistem Manajemen Tugas</h3>
            <div class="flex space-x-2">
                <button @click="editProject({
                    id: 1, 
                    name: 'Sistem Manajemen Tugas',
                    description: 'Platform untuk manajemen tugas mahasiswa',
                    supervisor_id: '1',
                    deadline: '2023-06-15'
                })" class="text-primary hover:text-primary-hover">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- ... konten card lainnya ... -->
    </div>
</div>

<script>
    // Fungsi untuk simpan/update (contoh)
    function saveProject() {
        // Implementasi API call untuk simpan proyek baru
        toast.success('Proyek berhasil disimpan!');
    }
    
    function updateProject() {
        // Implementasi API call untuk update proyek
        toast.success('Proyek berhasil diperbarui!');
    }
</script>
        
        <!-- Tombol Aksi -->
        <div class="flex justify-end space-x-3 pt-4">
            <button type="button" 
                    class="px-6 py-3 border border-border dark:border-dark-border rounded-xl text-text-primary dark:text-dark-text-primary hover:bg-surface-100 dark:hover:bg-dark-surface-100 transition duration-200">
                Batal
            </button>
            <button type="button" 
                    class="px-6 py-3 bg-primary hover:bg-primary-hover text-white rounded-xl transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-surface dark:focus:ring-offset-dark-surface">
                Simpan Proyek
            </button>
        </div>
    </form>
</div>
</x-app-layout>