<p align="center"><a href="#" target="_blank"><img src="https://raw.githubusercontent.com/Mohpoe/Danus/master/public/assets/images/logo.png" width="100"></a></p>

# LABKOMMAT

## Cara Install Laravel

1. Download [Composer](https://getcomposer.org/download/) dan pilih **Composer-Setup.exe**.

<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/composer-download.png">

2. Install Composer hingga selesai. Untuk memastikan proses instalasi telah sukses, buka `cmd` lalu tuliskan perintah `compsoer`. Jika tampil seperti berikut ini, artinya proses instalasi telah selesai.

<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/composer-test.png">

3. Sampai di sini, kamu sudah bisa install Laravel di folder manapun yang kamu inginkan. Tetapi untuk proses instalasi Laravel pada repositori dari Github, ikuti langkah berikutnya.

4. Silakan bergabung sebagai kontributor repositori ini dan *clone* ke penyimpanan lokal di PC kamu. (Atau tanpa *clone*, kamu juga bisa download repositori ini secara manual).

5. Buka folder di mana seluruh file dari repositori ini berada melalui *command prompt* lalu jalankan perintah `composer install` pada direktori tersebut.

6. Selanjutnya, tunggu hingga proses pemasangan laravel selesai dan *project* tersebut siap kamu jalankan. Jika terdapat pesan *error* seperti gambar berikut, silakan klik pada **Generate app key**.

<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/IJ3ai.png">

## Kumpulan `php artisan`

### Membuat project baru

Pertama-tama buka *command prompt* dan arahkan ke folder di mana kamu ingin menempatkan folder *project* laravel kamu. Lalu tuliskan perintah berikut di `cmd`.

```
composer create-project --prefer-dist laravel/laravel <nama_folder>
```

Atau menggunakan perintah:

```
composer global require laravel/installer
laravel new <nama_folder>
```

### Membuat Controller

```
php artisan make:controller PageController
```

### Membuat & menjalankan Migration

```
php artisan make:migration create_penggunas_table --create=penggunas
php artisan migrate
php artisan migrate:reset
php artisan migrate:fresh
php artisan migrate:fresh --seed
php artisan migrate:rollback --step=1
```

### Membuat Model

```
php artisan make:model Pengguna
php artisan make:model Mahasiswa -mc
php artisan make:model Mahasiswa --migration --controller
```

### Membuat Middleware

```
php artisan make:middleware KhususAdminMiddleware
```

### Membuat Request Validated (format validasi dari form input)

```
php artisan make:request PendaftaranMahasiswa
```

### Membuat resource (public function CRUD di controller)

```
php artisan make:model Barang --mcr
php artisan make:model Barang --migration --controller --resource
```

### Membuat Database Seeder

```
php artisan make:seeder PenggunaTableSeeder
php artisan db:seed
php artisan db:seed --class=PenggunaTableSeeder
```

### Membuat Factory

```
php artisan make:factory BarangFactory
```

### Tambah Class Mailable

```
php artisan make:mail TolakBerkas
```

```
php artisan optimize:clear
```

### Tampilkan daftar vendor/packages

```
composer show -i
```

### Uninstall package

```
composer remove spatie/browsershot
```

### Install package dengan versi tertentu

```
composer require knplabs/knp-snappy:1.3.0
```
