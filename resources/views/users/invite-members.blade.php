<h2 class="text-xl font-bold text-text-primary dark:text-dark-text-primary mb-4">Undang Anggota</h2>

<form class="space-y-4">
    <div>
        <label for="project-select" class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary mb-1">Pilih Proyek</label>
        <select id="project-select" class="w-full px-3 py-2 border border-border dark:border-dark-border rounded-lg bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200">
            <option value="">Pilih Proyek</option>
            <option value="1">Sistem Manajemen Tugas</option>
            <option value="2">Aplikasi E-Learning</option>
            <option value="3">Platform IoT untuk Pertanian</option>
        </select>
    </div>
    
    <div>
        <label for="member-email" class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary mb-1">Email/NIM Anggota</label>
        <input type="text" id="member-email" placeholder="Masukkan email atau NIM" class="w-full px-3 py-2 border border-border dark:border-dark-border rounded-lg bg-surface dark:bg-dark-surface text-text-primary dark:text-dark-text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition duration-200">
        <p class="mt-1 text-xs text-text-secondary dark:text-dark-text-secondary">Untuk mahasiswa gunakan NIM, untuk dosen gunakan email</p>
    </div>
    
    <div class="pt-2">
        <button type="button" @click="toast.success('Undangan berhasil dikirim!')" class="px-4 py-2 bg-primary hover:bg-primary-hover text-white rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-surface dark:focus:ring-offset-dark-surface">
            Undang Anggota
        </button>
    </div>
</form>