up: docker-up
init: docker-down-clear docker-pull docker-build docker-up project-init migrations

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

project-init: composer-install assets-install

composer-install:
	docker-compose exec php-fpm composer install

assets-install:
	docker-compose exec node npm install

test:
	docker-compose exec php-fpm php bin/phpunit

#PHPStan - PHP Static Analysis Tool
stan:
	docker-compose exec php-fpm vendor/bin/phpstan analyze src

#Code sniffer
sniff:
	docker-compose exec php-fpm ./vendor/bin/phpcs --error-severity=1 --warning-severity=8 --colors ./src; \
	docker-compose exec php-fpm ./vendor/bin/phpcs --error-severity=1 --warning-severity=8 --colors --report=summary ./src; return 0;

perm:
	sudo chown ${USER}:${USER} ./bin -R
	sudo chown ${USER}:${USER} ./config -R
	sudo chown ${USER}:${USER} ./docker -R
	sudo chown ${USER}:${USER} ./public -R
	sudo chown ${USER}:${USER} ./src -R
	sudo chown ${USER}:${USER} ./templates -R
	sudo chown ${USER}:${USER} ./tests -R
	sudo chown ${USER}:${USER} ./translations -R
	sudo chown ${USER}:${USER} ./var -R
	sudo chown ${USER}:${USER} ./vendor -R
	sudo chown ${USER}:${USER} ./composer.json -R

bash:
	docker-compose exec php-fpm bash

frontend-bash:
	docker-compose exec node sh

frontend-watch:
	docker-compose exec node npm run watch

migrations:
	docker-compose exec php-fpm php bin/console doctrine:migrations:migrate --no-interaction

fixtures:
	docker-compose exec php-fpm php bin/console doctrine:fixtures:load --no-interaction

