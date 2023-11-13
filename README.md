<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Tldr

```bash
git clone https://github.com/irsyadadl/liosk.git
cd liosk
composer install
cp .env.example .env
php artisan key:generate
bun i && bun run build
php artisan migrate
```

### Quick Login
Before you can login, you need to create a user. You can do that by visiting `/register` route. Or if you want, you can of course run the seeder by running `php artisan db:seed`.

And then you can login as usual. Or if you want to login quickly, you can visit `/dev/login/1` and you will be logged in as user that has id of 1.

### Formatter
By default, this project using [Laravel Duster](https://parsinta.com/eYtfMw8f),so you can run this command to format your code.
```bash
vendor/bin/duster fix
```

### Dark mode
This project has a dark mode feature. You can enable it by clicking the moon icon on the top right of the page. And if you want to change the default theme, you can change it in `resources/css/app.css` file. It's using the css variable, so you can change it easily.

### Premium Partners

-   **[irsyad.co](https://irsyad.co/)**
-   **[parsinta.com](https://parsinta.com/)**
-   **[karteil.com](https://karteil.com/)**
-   **[ayoseh.at](https://ayoseh.at/)**
-   **[perkebunan.org](https://perkebunan.org/)**
-   **[jetbrains.com](https://jetbrains.com/)**
