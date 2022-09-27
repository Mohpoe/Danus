<p align="center"><a href="#" target="_blank"><img src="https://raw.githubusercontent.com/Mohpoe/Danus/master/public/assets/images/logo.png" width="100"></a></p>

```
    __                 __     ___     ____   __ __ ____   __  ___ __  ___ ___   ______
   / /_   ___   _____ / /    /   |   / __ ) / //_// __ \ /  |/  //  |/  //   | /_  __/
  / __ \ / _ \ / ___// /    / /| |  / __  |/ ,<  / / / // /|_/ // /|_/ // /| |  / /   
 / /_/ //  __// /   / /___ / ___ | / /_/ // /| |/ /_/ // /  / // /  / // ___ | / /    
/_.___/ \___//_/   /_____//_/  |_|/_____//_/ |_|\____//_/  /_//_/  /_//_/  |_|/_/     
                                                                                      
```

## Cara Install Composer

Sebelum meng-install aplikasi **Composer**, pastikan kamu telah meng-install [XAMPP](https://www.apachefriends.org/download.html) ataupun software web server lokal lainnya.

1. Download [Composer](https://getcomposer.org/download/) dan pilih **Composer-Setup.exe**.

<p align="center">
<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/composer-download.png">
</p>

2. Install Composer hingga selesai. Untuk memastikan proses instalasi telah sukses, buka **cmd** lalu tuliskan perintah `composer`. Jika tampil seperti berikut ini, artinya proses instalasi telah selesai.

<p align="center">
<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/composer-test.png">
</p>

3. Sampai di sini, kamu sudah bisa install Laravel di folder manapun yang kamu inginkan. Tetapi untuk proses instalasi Laravel pada repositori dari Github, ikuti langkah berikutnya.

## Menghubungkan GitHub ke VSCode & Repository Danus

1. Download dan install VSCode melalu [website VSCode](https://code.visualstudio.com/download). Untuk langkah-langkah proses instalasi, silakan cari referensi dari situs lain atau [di sini](https://www.sekayuweb.com/2021/07/cara-install-visual-studio-code-di-windows.html).

2. Setelah itu, buka aplikasi VSCode dan pilih menu **Account** yang ada di pojok kiri-bawah, dan hubungkan akun GitHub kamu. Pastikan akun GitHub tersebut sudah bergabung menjadi kontributor pada repository Danus ini untuk bisa melanjutkan ke langkah berikutnya.

<p align="center">
<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/github-account.png">
</p>

3. Setelah terhubung, buka menu **Source Control**, selanjutnya kamu akan diarahkan untuk meng-install aplikasi **Git** jika belum. Silakan install aplikasi **Git**. Untuk langkah-langkah proses instalasi **Git**, silakan cari referensi dari situs lain atau [di sini](https://www.niagahoster.co.id/blog/git-tutorial-dasar/).

<p align="center">
<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/github-source-control.png">
</p>

4. Setelah **Git** ter-install, maka di menu *Source Control* pilih *Clone Repository*, pilih *Clone from GitHub* dan pilih *repository* yang ingin kamu *clone*, dalam hal ini repository **Danus**.

<p align="center">
<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/github-clone-repo.png">
</p>

5. Tunggu hingga proses *cloning* selesai dan seluruh file dari repository ini akan tersimpan di direktori lokal. Selanjutnya buka direktori tersebut melalui **cmd** atau **Git bash** lalu tuliskan perintah `composer install`, dan proses instalasi framework Laravel akan dilakukan, tunggu hingga proses tersebut selesai.

6. Setelah itu jalankan perintah `php artisan key:generate` dan aplikasi Danus siap dijalankan menggunakan perintah `php artisan serve` melalui **cmd** atau **Git bash**.

7. Jika terdapat pesan *error* seperti gambar berikut, silakan klik pada **Generate app key**. (Hal ini terjadi apabila perintah `php artisan key:generate` tidak dijalankan).

<p align="center">
<img src="https://raw.githubusercontent.com/Mohpoe/dokumentasi/master/danus/IJ3ai.png">
</p>

## Kumpulan perintah `php artisan`

### Membuat project baru

Pertama-tama buka *command prompt* dan arahkan ke folder di mana kamu ingin menempatkan folder *project* laravel kamu. Lalu tuliskan perintah berikut di `cmd`. **Pastikan kamu kenali fungsi dari perintah-perintah berikut sebelum menjalankannya!**

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

### Membersihkan Cache

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

## Package List

Berikut ini daftar *package* yang digunakan dalam proyek ini.

1. maatwebsite/excel
