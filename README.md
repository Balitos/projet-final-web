Pour pouvoir notre projet : 


composer install
cp .env.example.env
php artisan key:generate
php artisan migrate
php artisan db:seed

Pour pouvoir afficher les images : 

php artisan storage:link
