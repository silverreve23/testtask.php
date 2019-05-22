default: install
install:
	-docker-compose up --build
run:
	-docker-compose up
settings:
	-docker-compose exec php-fpm php artisan key:generate
	-docker-compose exec php-fpm php artisan migrate
	-docker-compose exec php-fpm php artisan db:seed
