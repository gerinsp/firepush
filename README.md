# Firepush
A Laravel package for push notification to the FCM (Firebase Cloud Messaging)

Package ini telah di upload di Packagist, anda bisa mengeunjunginya pada link berikut: [packagist.org](https://packagist.org/packages/gerinsp/firepush)

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

## Cara Penggunaan 

Setelah berhasil melakukan konfigurasi, selanjutnya kita tinggal `import namespace` dan panggil `class` nya.

```bash
<?php

use Gsp\Firepush\PushNotification;

class class HomeController extends Controller
{
  ....
  PushNotification::sendPush($regis_id, $title, $body, $icon, $url);
}
```

Didalam method `sendPush()` tersebut terdapat 5 parameter, yaitu:

1. `regis_id`, merupakan parameter yang digunakan untuk mengirim notifikasi ke spesifik user, `regis_id` ini berupa id perangkat yang diberikan oleh `firebase` nya.
2. `title`, merupakan judul dari notifikasi yang akan kita kirim.
3. `body`, merupakan isi pesan dari notifikasi yang akan dikirim.
4. `icon`, merupakan icon yang akan muncul di notifikasi saat diterima di perangkat mobile nya. (optional)
5. `url`, merupakan url browser yang digunakan untuk mengarahkan user ke alamat tertentu, ketika user klik notifikasinya. (optional)

Selain itu kita juga bisa menerima return response dari firebase nya untuk mengetahui apakah notifikasi nya terkirim atau tidak.

**contohnya**

```bash
$response = PushNotification::sendPush($regis_id, $title, $body, $icon, $url);
```

Selanjutnya kita tinggal simpan saja responsenya.

**contoh response sukses**

```bash
{
  "multicast_id":9070918413037267170,
  "success":1,
  "failure":0,
  "canonical_ids":0,
  "results":[
    {
      "message_id":"0:1683778122791572%4d6e21f0f9fd7ecd"
    }
  ]
}
```

Jika sukses, maka response `"success"` nya sama dengan true, dan terdapat `"message_id"` nya.

**contoh response gagal**

```bash
{
  "multicast_id":6600435569629740876,
  "success":0,
  "failure":1,
  "canonical_ids":0,
  "results":[
    {
      "error":"NotRegistered"
    }
  ]
}
```

Namun, jika gagal maka response `"success"` nya false dan `"failure"` nya true. 
Harap diperhatikan juga jika response nya gagal maka kemungkinan `regis_id` nya sudah `expired` jadi, harap perbaharui `regis_id` nya secara berkala.

## Lisensi

Projek ini ada di bawah lisensi [MIT License](LICENSE).
