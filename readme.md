# DI Test Application

## Specification

### Business requirements
Write a class with a method that takes 2 integers between 1 and 100.
Loop from the first integer to the second integer.
Write out each integer.
If the integer is divisible by 3 also print out “fizz”
If the integer is divisible by 5 also print out “buzz”

### Development requirements
Before you write any other code write some unit tests

As we are developing Enterprise Software we will paying particular attention to:
1. Code clarity and ease of understating
2. Well commented code that gives clear and appropriate explanations
3. Code that shows an understanding of Enterprise Software development
requirements. i.e. we are just as interested in failure modes as in
the happy path.
4. Code should demonstrate understanding of the features of PHP 7.

## Usage
1. Install PHP 7.0 or greater
2. Install composer (https://getcomposer.org/)
3. Run `composer install`
4. Run the `index.php` file
5. Run PHPUnit tests, `./vendor/bin/phpunit --bootstrap ./vendor/autoload.php tests/`
