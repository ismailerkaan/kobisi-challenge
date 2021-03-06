<p align="center"><a href="https://www.kobisi.com" target="_blank"><img src="https://wwwcdn.kobisi.com/logo-black.png" width="400"></a></p>


## Yapılanlar Başlıklar
```sh
   *API
   *CALLBACK
   *WORKER
```

## Kurulum

Gereklilikler:

[PHP 7.4+](https://www.google.com/search?client=opera&q=php+7+install&sourceid=opera&ie=UTF-8&oe=UTF-8) ve [composer](https://getcomposer.org).

```sh
git clone https://github.com/ismailerkaan/kobisi-challange.git
cd kobisi-challange
composer install
// .env.example dosyasının adını .env olarak düzenleyiniz
// .env dosyasını veritabanı ayarlarınıza göre değiştiriniz
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Konsol Komutları

```sh
// Worker'ın çalışması için:
php artisan queue:work

// Lisans süresi bitmiş firmaların ödemelerini çekme işlemini el ile başlatmak için
php artisan packages:payment
```
