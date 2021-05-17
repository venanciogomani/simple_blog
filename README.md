## Installation Notes

This is a simple blog template to demonstrate simple CRUD functionality with Laravel 8

- Clone repo
- Copy contents of .env.example to .env
- Generate keys with `php artisan key:generate`
- Run `npm install`
- Create a database and set credentials in .env
- Run migrations with `php artisan migrate`
- Run seeders to create dummy posts with `php artisan db:seed --class=DatabaseSeeder`
- Visit the /blog page as visitor and as logged in user
- Admin user email is `cadlegomani@gmail.com` and password is `admin123`