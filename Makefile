# Makefile for Laravel project with Docker

# Set the PHP container name
PHP_CONTAINER_NAME=my-laravel-app

# Set the Docker Compose command
DOCKER_COMPOSE=docker-compose
DOCKER=docker

# Set the PHP container service name
PHP_SERVICE_NAME=app

# Set the path to the Laravel project
LARAVEL_PATH=./src
CONTAINER_ID=$(docker ps -aqf "name=blog")

# SSH into the PHP container
ssh:
	$(DOCKER_COMPOSE) exec -it $(PHP_SERVICE_NAME) bash

# Install project dependencies
install:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) composer install

# Update project dependencies
update:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) composer update

# Run Laravel Artisan console
artisan:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) php artisan

migrate:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) php artisan migrate:install

# Example artisan command (replace with your own)
example-command:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) php artisan your:command

db_ip:
	id=$$(docker ps -aqf "name=postgres");\
	$(DOCKER) inspect "$$id" --format='{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}'

# Install project dependencies with Composer, copy .env.example to .env, and generate application key
setup:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) composer install && \
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) cp .env.example .env && \
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) php artisan key:generate && \
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) sh -c "npm install && npm install laravel-vite-plugin" && \
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) npm run dev && npm run build

run:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) npm run dev
build:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) npm run build