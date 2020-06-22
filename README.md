# Sample API

Ini hanyalah contoh sederhana penggunaan Rest API menggunakan framework Lumen. Saya asumsikan kalian sudah meng-*install* Composer dan Lumen dikomputer kalian, jika belum, silahkan *install* terlebih dahulu [di sini](https://lumen.laravel.com/docs/7.x#installation)

## Setup & Run

1. Copy file `.env.example` dari folder root menjadi `.env`
2. Buka file `.env`, ubah isi dari `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`. Sesuaikan konfigurasi database MySql yang ada dikomputer kalian
3. Buka terminal atau command promp, lalu masukkan perintah `php artisan migrate`. Perintah tersebut akan melakukan migrasi ke dalam database yang sudah kalian buat sebelumnya. File migrasi bisa kalian temukan di dalam folder `database->migrations`
4. Jika sudah berhasil ter-migrasi, masukkan perintah `php -S localhost:8080 -t public` untuk menjalankan server Lumen
5. Jika sudah berjalan, silahkan buka dibrowser dengan mengetikan `http://localhost:8080` di address bar pada browser (hanya untuk memastikan server sudah berjalan dengan benar atau belum).

## Struktur Folder

1. Untuk mencari file controller, kalian bisa temukan di dalam folder `app->Http->Controllers`
2. Untuk mencari file model, kalian bisa temukan di dalam folder `app`, contoh file `UsersModel.php`
3. Untuk menambah, menghapus, atau mengubah `route`, kalian bisa buka file `web.php` yang berada di dalam folder `routes`