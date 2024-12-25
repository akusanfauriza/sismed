# Sistem Informasi Medis

## Deskripsi Proyek
Sistem Informasi Medis adalah sebuah aplikasi untuk mengelola data medis, pasien, dan operasional klinik atau rumah sakit. Proyek ini dibangun menggunakan teknologi modern untuk memberikan solusi manajemen data medis yang efisien.

## Persyaratan Sistem
- PHP 8.0 atau lebih baru
- Composer
- Database MySQL/MariaDB
- Web server (Apache/Nginx)

## Instalasi

### 1. Membuat Database
1. Buat sebuah database baru dengan nama `db_sismed`.
   ```sql
   CREATE DATABASE db_sismed;
   ```

### 2. Mengatur File Konfigurasi
1. Salin file `.env.example` menjadi `.env`.
   ```bash
   cp .env.example .env
   ```
2. Sesuaikan konfigurasi koneksi database di dalam file `.env`:
   ```env
   DB_DATABASE=db_sismed
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

### 3. Instalasi Dependensi
Jika terdapat error saat menjalankan proyek, instal dependensi menggunakan Composer:
```bash
composer install
```

### 4. Migrasi Database
Untuk mempersiapkan struktur database, jalankan migrasi:
```bash
php artisan migrate
```

### 5. Menjalankan Aplikasi
Jalankan server pengembangan menggunakan perintah berikut:
```bash
php artisan serve
```
Akses aplikasi melalui browser di `http://localhost:8000`.

## Fitur
- Manajemen data pasien
- Rekam medis elektronik
- Pengelolaan jadwal dokter
- Laporan statistik medis