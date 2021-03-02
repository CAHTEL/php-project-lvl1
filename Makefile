install:
	composer install
brain-even:
	php bin/brain-even
brain-calc:
	php bin/brain-calc
brain-gcd:
	php bin/brain-gcd
brain-progression:
	php bin/brain-progression
brain-prime:
	php bin/brain-prime
validate:
	composer validate
lint:
	composer run-script phpcs -- --standard=PSR12 src bin
