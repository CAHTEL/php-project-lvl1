install:
	composer install
brain-games:
	php bin/brain-games
brain-even:
	php bin/brain-even
validate:
	composer validate
lint:
	composer run-script phpcs -- --standard=PSR12 src bin
test:
	composer run-script test src bin