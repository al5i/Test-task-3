<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## API Method Use:
* --GET--POST--
## Для вывода списка тендоров
* API V1: /api/tender/
## Для поиска по списку с фильтрацией
* API V1: /api/tender?title=text&date=date
## Для добавления записей через файл
* API V1 POST: /api/tender/import
## Для создания тендера
* API V1 POST: /api/tender/create
## Запуск приложения
```bash
composer install
php artisan serve --host=localhost
# Test-task-3
