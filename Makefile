# Makefile for Laravel project with Docker

# Set the PHP container name
PHP_CONTAINER_NAME=my-laravel-app

# Set the Docker Compose command
DOCKER_COMPOSE=docker-compose

# Set the PHP container service name
PHP_SERVICE_NAME=app

# Set the path to the Laravel project
LARAVEL_PATH=./src

# SSH into the PHP container
ssh:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) sh

# Install project dependencies
install:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) composer install

# Update project dependencies
update:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) composer update

# Run Laravel Artisan console
artisan:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) php artisan

# Example artisan command (replace with your own)
example-command:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) php artisan your:command

# Run PHPUnit tests
test:
	$(DOCKER_COMPOSE) exec $(PHP_SERVICE_NAME) vendor/bin/phpunit