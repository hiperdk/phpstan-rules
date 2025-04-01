exec:
	docker compose run --build --rm php sh -c "composer install --classmap-authoritative --no-progress && exec bash"

clean:
	rm -rf vendor .phpstan.result-cache .phpunit.cache .composer-cache