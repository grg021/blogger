## Getting Started

This is a sample application created by Greg Hermo using Laravel 8, Livewire and TailwindCSS. Please run the commands 
below to setup.
```
composer install --optimize-autoloader --no-dev
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run prod
php artisan config:cache
php artisan route:cache
php artisan serve
```

### Main Features / Pages
* home - shows a paginated list of blogs in the system.
* manage blog - allows user to view blogs he/she created
* create blog - allows user to create a new blog
* login / registration
* fetch blog - fetches blogs from a 3rd party source
```php artisan blogs:fetch``` 
  This is also scheduled to run every 15 minutes.

