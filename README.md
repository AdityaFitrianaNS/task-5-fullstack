<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
    </a>
</p>

## Instalation

### Rename file
    Change name .env.example to .env

### Prepare dependencies
    - composer install

### Change Database Config
    Change Database configuration in .env

### Generate and Migration
    - php artisan key:generate
    - php artisan passport:install
    - php artisan migrate --seed

### Prepare FrontEnd
    - npm install
    - npm run dev

### Run Test and Development Server
    - php artisan test
    - php artisan serve