.PHONY: build up down test install

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

test:
	docker-compose exec app vendor/bin/phpunit

install:
	docker-compose exec app composer install
