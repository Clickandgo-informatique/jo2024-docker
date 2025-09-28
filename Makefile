PROJECT_NAME=jo2024-docker

# Docker lifecycle
build:
	docker-compose down --volumes --remove-orphans
	docker system prune -af
	docker-compose build --no-cache

up:
	docker-compose up -d

down:
	docker-compose down --volumes --remove-orphans

restart:
	docker-compose down --volumes --remove-orphans
	docker-compose build --no-cache
	docker-compose up -d

logs:
	docker-compose logs -f

# Container access
php:
	docker exec -it $(PROJECT_NAME)_php bash

nginx:
	docker exec -it $(PROJECT_NAME)_nginx sh

db:
	docker exec -it $(PROJECT_NAME)_db bash

# Web tools
pma:
	open http://localhost:8081

mailhog:
	open http://localhost:8025

# Symfony CLI
symfony:
	docker exec -it $(PROJECT_NAME)_php php bin/console

cache-clear:
	docker exec -it $(PROJECT_NAME)_php php bin/console cache:clear

# Symfony commands
migrate:
	docker exec -it $(PROJECT_NAME)_php php bin/console doctrine:migrations:migrate --no-interaction

migration:
	docker exec -it $(PROJECT_NAME)_php php bin/console make:migration --no-interaction

fixtures:
	docker exec -it $(PROJECT_NAME)_php php bin/console doctrine:fixtures:load --no-interaction

schema-update:
	docker exec -it $(PROJECT_NAME)_php php bin/console doctrine:schema:update --force

# Reset database complet (création si inexistante)
reset-db:
	docker exec -it $(PROJECT_NAME)_db mysql -u root -proot -e "CREATE DATABASE IF NOT EXISTS jo2024 CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
	docker exec -it $(PROJECT_NAME)_php php bin/console doctrine:database:drop --force --if-exists
	docker exec -it $(PROJECT_NAME)_php php bin/console doctrine:database:create --if-not-exists
	docker exec -it $(PROJECT_NAME)_php php bin/console doctrine:migrations:migrate --no-interaction
	docker exec -it $(PROJECT_NAME)_php php bin/console doctrine:fixtures:load --no-interaction

# Tests
test:
	docker exec -it $(PROJECT_NAME)_php php bin/phpunit
