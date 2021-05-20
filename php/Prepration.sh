cd /var/www/html/hoory
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
