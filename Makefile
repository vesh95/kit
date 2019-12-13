# include .env
# export

env:
	@docker-compose exec --user=www-data php bash

migrate:
	@docker-compose exec --user=www-data php yii migrate --interactive=0

up:
	@docker-compose up -d --build --remove-orphans

down:
	@docker-compose down

down-v:
	@docker-compose down -v

install: up composer-install yii-app-setup

composer-install:
	@docker-compose exec --user=www-data php composer install

yii-app-setup:
	@docker-compose exec --user=www-data php yii app/setup --interactive=0
