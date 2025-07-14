<h2 class="text-xl font-bold text-text-primary dark:text-dark-text-primary mb-4">Daftar Proyek</h2>

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-border dark:divide-dark-border">
        <thead class="bg-surface-50 dark:bg-dark-surface-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-text-secondary dark:text-dark-text-secondary uppercase tracking-wider">Nama Proyek</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-text-secondary dark:text-dark-text-secondary uppercase tracking-wider">Dosen Pembimbing</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-text-secondary dark:text-dark-text-secondary uppercase tracking-wider">Jumlah Tugas</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-text-secondary dark:text-dark-text-secondary uppercase tracking-wider">Status</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-text-secondary dark:text-dark-text-secondary uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-surface dark:bg-dark-surface divide-y divide-border dark:divide-dark-border">
            <!-- Example Project Row -->
            <tr class="hover:bg-surface-50 dark:hover:bg-dark-surface-50 transition-colors duration-150">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-text-primary dark:text-dark-text-primary">Sistem Manajemen Tugas</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary dark:text-dark-text-secondary">Dr. Ahmad Budiman</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary dark:text-dark-text-secondary">5</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-success/10 text-success">Aktif</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-text-secondary dark:text-dark-text-secondary">
                    <button class="text-primary hover:text-primary-hover dark:hover:text-primary-hover mr-3">Lihat</button>
                    <button class="text-danger hover:text-danger/80">Keluar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>