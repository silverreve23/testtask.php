default: install
install:
	-docker-compose up -d --build
run:
	-docker-compose up -d
settings:
	-docker-compose exec php-fpm php artisan key:generate
	-docker-compose exec php-fpm php artisan migrate
	-docker-compose exec php-fpm php artisan db:seed
