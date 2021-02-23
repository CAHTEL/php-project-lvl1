install:
	composer install
brain-games:
	php bin/brain-games
brain-even:
	php bin/brain-games BrainEven
brain-calc:
	php bin/brain-games BrainCalc
brain-gcd:
	php bin/brain-games BrainGcd
brain-progression:
	php bin/brain-games BrainProgression
brain-prime:
	php bin/brain-games BrainPrime
validate:
	composer validate
lint:
	composer run-script phpcs -- --standard=PSR12 src bin
test:
	composer run-script test src bin