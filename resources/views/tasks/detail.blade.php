<x-app-layout>
    <div
        class="max-w-3xl mx-auto p-6 bg-surface text-text-primary dark:bg-dark-surface dark:text-dark-text-primary rounded-2xl shadow-soft transition duration-200"
    >
        <!-- Header -->
        <h1 class="text-2xl font-semibold mb-6">Detail Tugas</h1>

        <!-- Project Name -->
        <div class="mb-4">
            <label
                class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary"
            >
                Nama Proyek
            </label>
            <p class="mt-1 text-base">Sistem Absensi Sekolah</p>
        </div>

        <!-- Task Name -->
        <div class="mb-4">
            <label
                class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary"
            >
                Nama Tugas
            </label>
            <p class="mt-1 text-base">Integrasi Barcode Scanner</p>
        </div>

        <!-- Assigned To -->
        <div class="mb-4">
            <label
                class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary"
            >
                Dikerjakan Oleh
            </label>
            <p class="mt-1 text-base">Igor Presnyakov</p>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label
                class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary"
            >
                Deskripsi
            </label>
            <p class="mt-1 text-base leading-relaxed">
                Tugas ini bertujuan menghubungkan sistem absensi dengan alat
                pemindai barcode untuk mencatat kehadiran siswa secara otomatis.
            </p>
        </div>

        <!-- Deadline & Status -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Deadline -->
            <div>
                <label
                    class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary"
                >
                    Deadline
                </label>
                <p class="mt-1 text-base">25 Juli 2025</p>
            </div>

            <!-- Status -->
            <div>
                <label
                    class="block text-sm font-medium text-text-secondary dark:text-dark-text-secondary"
                >
                    Status
                </label>
                <span
                    class="mt-1 inline-block px-4 py-2 text-sm font-medium rounded-xl bg-info/20 text-info"
                >
                    Dalam Proses
                </span>
            </div>
        </div>
    </div>
</x-app-layout>
