setup:
	@make up-build
	@make composer-install
	@make npm-install-build
	@make set-permissions
	@make setup-env
	@make generate-key
	@make migrate-fresh-seed

stop:
	docker compose stop

up:
	docker compose up -d --build

composer-install:
	docker exec urlapp bash -c "composer install"

composer-update:
	docker exec urlapp bash -c "composer update"

set-permissions:
	docker exec urlapp bash -c "chmod -R 777 /var/www/html/storage"
	docker exec urlapp bash -c "chmod -R 777 /var/www/html/bootstrap"

setup-env:
	docker exec urlapp bash -c "cp .env.example .env"

generate-key:
	docker exec urlapp bash -c "php artisan key:generate"

migrate-fresh-seed:
	docker exec urlapp bash -c "php artisan migrate:fresh --seed"

storage-link:
  docker exec urlapp bash -c "php artisan storage:link"