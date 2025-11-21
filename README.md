# Aplikasi Laravel Biodata

Ini adalah aplikasi web sederhana yang dibangun dengan Laravel untuk mengelola data pribadi.

## Fitur

-   Membuat, Membaca, Memperbarui, dan Menghapus (CRUD) entri data pribadi.
-   Penyimpanan database untuk informasi biodata.

## Instalasi

Ikuti langkah-langkah berikut untuk mengatur proyek secara lokal:

1.  **Kloning repositori:**

    ```bash
    git clone https://github.com/abyanmaheswara/biodata-laravel.git
    cd biodata-laravel
    ```

2.  **Instal dependensi Composer:**

    ```bash
    composer install
    ```

3.  **Salin file environment:**

    ```bash
    cp .env.example .env
    ```

4.  **Hasilkan kunci aplikasi:**

    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi database Anda:**
    Buka file `.env` dan perbarui konfigurasi database. Untuk SQLite, Anda cukup memastikan `DB_CONNECTION` diatur ke `sqlite` dan `DB_DATABASE` menunjuk ke `database/database.sqlite`. Jika `database.sqlite` tidak ada, buatlah:

    ```bash
    touch database/database.sqlite
    ```

6.  **Jalankan migrasi database dan seeders:**

    ```bash
    php artisan migrate --seed
    ```
    Ini akan membuat tabel yang diperlukan dan mengisinya dengan data awal.

7.  **Instal dependensi Node.js (untuk aset frontend):**

    ```bash
    npm install
    ```

8.  **Kompilasi aset frontend:**

    ```bash
    npm run dev
    ```
    Atau untuk produksi:
    ```bash
    npm run build
    ```

## Penggunaan

Untuk menjalankan aplikasi, mulai server pengembangan Laravel:

```bash
php artisan serve
```

Kemudian, buka browser web Anda dan navigasikan ke `http://127.0.0.1:8000`.

## Kontribusi

Jangan ragu untuk berkontribusi pada proyek ini dengan mengirimkan isu atau pull request.

## Lisensi

Framework Laravel adalah perangkat lunak open-source yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).
