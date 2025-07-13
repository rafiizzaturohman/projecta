<div class="bg-surface-50 dark:bg-dark-surface-50 p-6 rounded-xl border border-border dark:border-dark-border">
    <h2 class="text-xl font-bold text-text-primary dark:text-dark-text-primary mb-6">Buat Proyek Baru</h2>
    
    <form class="space-y-5">
        <!-- Nama Proyek -->
        <div>
            <label for="project-name" class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary mb-2">Nama Proyek</label>
            <input type="text" id="project-name" 
                   class="w-full px-4 py-3 border border-border dark:border-dark-border rounded-xl bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200">
        </div>
        
        <!-- Deskripsi -->
        <div>
            <label for="project-description" class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary mb-2">Deskripsi</label>
            <textarea id="project-description" rows="4" 
                      class="w-full px-4 py-3 border border-border dark:border-dark-border rounded-xl bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200"></textarea>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <!-- Dosen Pembimbing -->
            <div>
                <label for="supervisor" class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary mb-2">Dosen Pembimbing</label>
                <select id="supervisor" 
                        class="w-full px-4 py-3 border border-border dark:border-dark-border rounded-xl bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200">
                    <option value="">Pilih Dosen Pembimbing</option>
                    <option value="1">Dr. Ahmad Budiman</option>
                    <option value="2">Prof. Siti Rahayu</option>
                    <option value="3">Dr. Bambang Setiawan</option>
                </select>
            </div>
            
            <!-- Deadline -->
            <div>
                <label for="deadline" class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary mb-2">Deadline</label>
                <input type="date" id="deadline" 
                       class="w-full px-4 py-3 border border-border dark:border-dark-border rounded-xl bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200">
            </div>
        </div>
        
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