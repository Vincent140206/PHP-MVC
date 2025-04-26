# MVC Sederhana - Aplikasi CRUD Foto

Aplikasi sederhana untuk manajemen foto (upload, edit, delete, list) menggunakan arsitektur **MVC** buatan sendiri dengan PHP native dan MySQL.

## Fitur
- List foto
- Upload foto
- Edit foto (ganti file)
- Delete foto

## Teknologi
- PHP 8.x
- MySQL
- PDO untuk koneksi database
- Apache dengan mod_rewrite
- CSS, HTML, sedikit JavaScript

## Struktur Proyek
```
MVC Sederhana/
│
├── app/
│   ├── controllers/        # Controller application
│   │   └── PhotoController.php
│   ├── models/             # Model application
│   │   └── Photo.php
│   └── views/              # Views (tampilan)
│       ├── photo/
│       │   ├── index.php
│       │   ├── create.php
│       │   ├── edit.php
│       └── errors/
│           └── 404.php
│
├── core/                   # Core MVC engine
│   ├── Router.php
│   ├── Controller.php
│   ├── Model.php
│
├── public/                 # Public directory (web root)
│   ├── css/
│   │   └── style.css       # Stylesheet
│   ├── uploads/            # Folder penyimpanan foto
│   ├── .htaccess           # Apache rewrite rules
│   └── index.php           # Front controller
└── README.md               # Dokumentasi proyek
```

## Instalasi
1. **Clone repository** ke folder `C:/xampp/htdocs/MVC Sederhana/` (Windows/XAMPP)
2. **Buat database** MySQL:
   ```sql
   CREATE DATABASE photo_app;
   USE photo_app;
   CREATE TABLE photos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       filename VARCHAR(255) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```
3. **Konfigurasi koneksi** di `core/Model.php` jika diperlukan (username/password/host).
4. **Pastikan** module **mod_rewrite** aktif di Apache.
5. **Set Permissions** untuk folder `public/uploads` agar dapat menulis file.
6. **Buka** di browser: `http://localhost:8080/MVC%20Sederhana/public/photo/index`

## Penggunaan
- Klik **Upload New Photo** untuk menambahkan foto baru.
- Di halaman **Edit**, pilih foto baru untuk mengganti.
- Gunakan tombol **Delete** untuk menghapus foto.
- URL tidak valid akan menampilkan halaman 404 custom.

## This project was crafted with ❤️ sama popmi
