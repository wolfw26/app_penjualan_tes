# APP-TES
_Web sederhana yang dibuat dengan PHP framework LARAVEL,dan interface menggunakan Livewire dan Tailwindcss_

## Fitur

- Create, Read, Udpate, Delete Produk.
- Create, Read, Update, Delete Kategori.
- Filter data produk By Status.
- Real-time validation form..
- Toastr notification.


## Teknologi


- [HTML] - Kerangka dasar Web
- [CSS] - Styling web
- [PHP] - bahasa skrip server, untuk membuat halaman Web yang dinamis dan interaktif.
- [Tailwindcss] - Framework CSS
- [Laravel] - PHP Framework untuk Server
- [Livewire] - Interface lebih interaktif
- [Toastify] - Library untuk Notifikasi toastr
- [node.js] - Javascript runtime environment


## Installation
Beberapa yang harus di siapkan 
- PHP
- Composer
- Database Mysql

##### Install PHP dan Composer
- PHP : https://www.php.net/downloads.php
- composer : https://getcomposer.org/download/

##### Clone dari Repositori
- Copy proyek dari repositori ini ke perangkat
```sh
git clone https://github.com/wolfw26/app_penjualan_tes.git
```
Install  dependensi

```sh
composer install
```

Buka code folder yang sudah di copy, dan salin **.env.example** menjadi **.env**
**Sesuaikan pengaturan database dan url aplikasi**

> DB_CONNECTION=mysql
> DB_HOST=127.0.0.1
> DB_PORT=3306
> DB_DATABASE=api_tes_prog
> DB_USERNAME= sesuaikan username
> DB_PASSWORD= sesuaikan password

**setting waktu, digunakan untuk ambil data dari API**

> APP_TIMEZONE=Asia/Makassar
> APP_LOCALE=id

**Timezone Indoensia**
> Asia/Jakarta
> Asia/Ujung_Pandang
> Asia/Pontianak
> Asia/Makassar
> Asia/Jayapura

**Genertae APP_KEY**

```sh
php artisan key:generate

```

### Menjalankan app
Jalankan perintah untuk membuat database, table dan menjalankan seeder

```sh
php artisan migrate --seed
```
jalankan aplikasi, buka terminal dan gunakan perintah ini:
```sh
php artisan serve --host=0.0.0.0 --port=8000
```
Buka browser dan ketikan **localhost:8000** untuk membuka aplikasi

### Untuk membuka smartphone
 **pastikan samrtphone tersambung ke jaringan yang sama**
cek IP dari perangkat yang terdapat aplikasi ini didalamnya
perintah untuk melihat IP perangkat : 
```sh
ipconfig
```
lihat pada bagian ip address
untuk menjalankan, buka browser dan ketik **ip.address.perangkat.server:8000**




   [HTML]: <https://developer.mozilla.org/en-US/docs/Web/HTML>
   [Livewire]: <https://livewire.laravel.com/>
   [Tailwindcss]: <https://tailwindcss.com/>
   [Laravel]: <https://laravel.com/docs/10.x>
   [Toastify]: <https://github.com/apvarun/toastify-js>
   [Mysql]: <https://www.mysql.com/>
   [node.js]: <http://nodejs.org>
   [CSS]: <https://www.w3schools.com/css/>
   [PHP]:<https://www.php.net/>
