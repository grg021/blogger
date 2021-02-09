## Getting Started

This is a sample application created by Greg Hermo using Laravel 8 and TailwindCSS. Please run the commands to setup.

- composer install --optimize-autoloader --no-dev
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- npm install && npm run prod
- php artisan config:cache
- php artisan route:cache
- php artisan serve

### Main Features / Pages
* home - shows the list of blogs in the system
* manage blog - allows user to view blogs he/she created
* create blog - allows user to create a new blog
* fetch blog - fetches blogs from a 3rd party source
* login / registration
