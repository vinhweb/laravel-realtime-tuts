<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Hướng dẫn setup
### Install vendor, packages
Sau khi clone code về. Các bạn chạy command:

```bash
composer install
```

Và install npm packages:
```bash
npm install
```
để cài đặt các code cần thiết.
### Pusher API
Truy cập vào https://pusher.com/. Tạo cho mình tài khoản và chèn thông tin Pusher vào file .env
```
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=
```

## Bắt đầu chạy tại local
Để call laravel serve, chạy:
```bash
php artisan serve
```
Và để css, js được hoạt động, chạy:
```bash
npm run dev
```