<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setup Instructions

- Clone the Repository
- Install Dependencies
   - composer install
- Configure the Environment
   Copy the .env.example file to .env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel_api
  DB_USERNAME=root
  DB_PASSWORD=
- Generate the Application Key
  php artisan key:generate
- Migrate the Database
  php artisan migrate
-Start the Development Server
  php artisan serve

## API Endpoints

1. Create User API

Endpoint: POST /api/users

Request Body:

{
  "email": "example@example.com",
  "password": "password123",
  "name": "John Doe"
}

Response Example:

{
  "id": 123,
  "email": "example@example.com",
  "name": "John Doe",
  "created_at": "2024-11-25T12:34:56Z"
}

