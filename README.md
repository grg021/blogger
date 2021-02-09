## Getting Started

This is a sample application created by Greg Hermo using Laravel 8, Livewire and TailwindCSS. Please run the commands 
below to setup.
```
git clone https://github.com/grg021/blogger.git
composer install --optimize-autoloader
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run prod
php artisan config:cache
php artisan route:cache
php artisan blogs:fetch
php artisan serve
```

Login as
```
u - system.admin@email.com
p - Asdf1234
```


### Main Features / Pages
* home - shows a paginated list of blogs in the system.
* manage blog - allows user to view blogs he/she created
* create blog - allows user to create a new blog
* login / registration
* fetch blog - fetches blogs from a 3rd party source
```php artisan blogs:fetch``` 
  This is also scheduled to run every 15 minutes.
  ```php artisan schedule:work```

### Running Scheduler
Add the entry to your CRON configuration
```angular2html
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
or run it locally using the command below
```angular2html
php artisan schedule:work
```
