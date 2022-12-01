# Books App

Showing most popular books, most popular author and rate book in scale 1-10

## Requirement

1. PHP version 7.3.0 or above
2. MySQL
3. Docker (optional)

Make sure you are connected during the instalation

## Instalation for Docker

1. Run `docker-compose up -d`
2. Run `docker logs -f timedoor-academy-pro-test_app_1` to see the instalation process and wait until the process is done.
3. Once the process is done, enter the app container with `docker exec -it timedoor-academy-pro-test_app_1 bash` using other terminal or exit the previous terminal
4. Run `php artisan migrate`
5. Access the app via http://localhost:3000

## Instalation without Docker

1. Run `composer install`
2. Copy `.env.example` file into `.env` file
3. Create database in mysql
4. Provide your mysql credential for example

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

4. Run `php artisan migrate`
5. Access the app via http://localhost:8000
