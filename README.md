# Projecta

Projecta, sebuah aplikasi berbasis web yang dirancang untuk memfasilitasi kolaborasi proyek dan manajemen tugas bagi mahasiswa, dosen, dan admin di lingkungan kampus. Aplikasi ini berfungsi sebagai asisten teknologi yang membantu mengorganisasi proyek perkuliahan, mengelola deadline, serta mendokumentasikan progres kerja secara sistematis dan efisien.

## 🎯 Fitur Utama

-   🔐 Autentikasi Peran: Mendukung peran student, lecturer, dan admin.

-   📚 Manajemen Mata Kuliah: Dosen dapat membuat dan mengelola data mata kuliah.

-   📁 Manajemen Proyek: Setiap proyek terkait dengan mata kuliah dan memiliki deskripsi serta deadline.

-   ✅ Manajemen Tugas: Proyek terdiri dari beberapa tugas yang bisa ditugaskan ke mahasiswa tertentu.

-   👥 Keanggotaan Proyek: Mahasiswa dapat tergabung dalam satu atau lebih proyek.

-   🕓 Soft Deletes: Data tidak langsung dihapus permanen, sehingga mendukung restore jika diperlukan.

## 🗂️ Struktur Database

-   users – Menyimpan data pengguna (mahasiswa, dosen, admin)

-   matakuliah – Data mata kuliah yang diajarkan dosen

-   projects – Proyek yang berhubungan dengan mata kuliah

-   tasks – Tugas-tugas dalam proyek

-   project_members – Tabel pivot many-to-many antara users dan projects

## 🚀 Tujuan

Projecta dikembangkan untuk:

-   Menumbuhkan budaya kolaboratif dalam pengerjaan tugas/proyek

-   Memberikan dosen alat untuk memantau progres mahasiswa

-   Menyediakan sistem manajemen proyek yang sederhana namun efisien untuk kegiatan akademik

## Documentation

[Laravel 12](https://laravel.com/docs/12.x)

[MySQL](https://www.mysql.com/)

## 🛠️ Teknologi yang Digunakan

-   Framework: Laravel 12

-   Database: MySQL

-   Frontend: Blade + Tailwind CSS

## Authors

-   [@rafiizzaturohman](https://www.github.com/rafiizzaturohman)
-   [@alyaaputrii](https://www.github.com/alyaaputrii)
-   [@rini945](https://www.github.com/rini945)
-   [@Ananda24110193](https://www.github.com/Ananda24110193)
