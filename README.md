# Firepush
A Laravel package for push notification to the FCM (Firebase Cloud Messaging)

Package ini telah di upload di Packagist, anda bisa mengeunjunginya pada link berikut: [packagist.org](https://packagist.org/packages/gerinsp/firepush#v1.0.0)

## Cara Install

```bash
composer require gerinsp/firepush
```
## Konfigurasi

Setelah berhasil menginstall package tersebut, selanjutnya anda harus mendaftarkannya di service provider yang ada di direktori config/app.php

**cara mendaftarkan service providers**

```bash
Gsp\Firepush\FirepushServiceProvider::class
```

Tambahkan baris kode tersebut ke dalam direktory config/app.php [providers]

**contohnya**

```bash
'providers' => [
  .....
  Gsp\Firepush\FirepushServiceProvider::class
],
```

Setelah berhasil mendaftarkan service provider, selanjutnya publish file config

```bash
php artisan vendor:publish --tag=firepush-config
```

Pastikan di direktori config projek kalian terdapat file `firepush.php`.
Lalu, setelah itu tambahkan `server_key` projek firebase kalian ke file `.env`

```bash
FIREBASE_SERVER_KEY='your_server_key'
```

## Lisensi

Projek ini ada di bawah lisensi [MIT License](LICENSE).
