install:
	composer install
brain-games:
	php bin/brain-games
brain-even:
	php bin/brain-even
brain-calc:
	php bin/brain-calc
brain-gcd:
	php bin/brain-gcd
validate:
	composer validate
lint:
	composer run-script phpcs -- --standard=PSR12 src bin
test:
	composer run-script test src bin