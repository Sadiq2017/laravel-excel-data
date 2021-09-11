init: docker-down docker-pull docker-build docker-up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

app-init: app-install-composer

app-install-composer:
	docker-compose run --rm php-cli composer install --ignore-platform-reqs

composer-update:
	yes | docker-compose run --rm php-cli composer update

db-fresh: migrate-fresh

migrate:
	docker-compose run --rm php-cli php artisan migrate

migrate-fresh:
	docker-compose run --rm php-cli php artisan migrate:fresh

generate:
	docker-compose run --rm php-cli php artisan key:generate

storage:
	docker-compose run --rm php-cli php artisan storage:link

queue-work:
	docker-compose run --rm php-cli php artisan queue:work

