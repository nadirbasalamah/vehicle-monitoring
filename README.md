## Vehicle Monitoring Application

Web Application for vehicle usage monitoring for company.

## Diagrams

### Activity Diagram

<img src="./docs/vehicle_monitoring_activity_diagram.png">

### Physical Data Model

<img src="./docs/vehicle_monitoring_pdm.png">

## User

-   Admin

```
email: admin@admin.com
password: 123123
```

-   Pihak Persetujuan

```
email: manager@manager.com
password: 123123
```

## App Details

-   PHP 8.0.0
-   MySQL 8.0.0
-   Framework: Laravel 8

## How to Use

1. Pastikan server lokal dan server MySQL telah terinstall.
2. Buat database baru dengan nama `vehicle_monitoring`.

```sql
CREATE DATABASE vehicle_monitoring;
```

3. Lakukan konfigurasi koneksi database pada file `.env`, contoh konfigurasi dapat dilihat pada file `.env.example`.

4. Lakukan instalasi berbagai dependensi dengan menggunakan command berikut.

```
composer install
```

5. Lakukan migrasi tabel ke database dengan menggunakan command berikut.

```
php artisan migrate
```

6. Lakukan seeding untuk data user dengan menggunakan command berikut.

```
php artisan db:seed --class=UserSeeder
```

### Untuk Admin

1. Login dengan menggunakan akun untuk admin.
2. Pilih menu Lihat daftar kendaraan.
3. Pilih tambah data kendaraan.
4. Isi data kendaraan lalu di bagian nama pihak persetujuan, isi dengan `manajer`.
5. Klik tambah.
6. Tambahkan data ke dalam pool dengan klik Tambahkan ke pool. Nantinya data kendaraan di pool akan ditentukan oleh pihak persetujuan apakah kendaraan dapat dipakai atau tidak.
7. Fitur monitoring juga tersedia untuk melihat kendaraan yang telah disetujui untuk digunakan, fitur tersebut dapat diakses pada halaman awal admin pada bagian monitoring data kendaraan.

### Untuk Pihak Penyetuju

1. Login dengan menggunakan akun untuk pihak persetujuan
2. Klik lihat data pool untuk melihat daftar kendaraan yang akan digunakan. Daftar kendaraan di pool disesuaikan dengan pihak persetujuan.
3. Klik `lihat` untuk melihat data kendaraan.
4. Untuk menyetujui kendaraan, lihat pada menu pilihan lalu pilih `setuju` lalu cantumkan catatan bila diperlukan.
5. Klik `submit`.
