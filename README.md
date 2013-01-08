## 12 TDDs of Christmas

Excercises from the [12 TDDs of
Christmas](http://www.wiredtothemoon.com/2012/12/12-tdds-of-christmas/)
implemented in [PHP](http://php.net).

### Credits

Blatantly (initially) copied from [jeremykendall](https://github.com/jeremykendall/12-tdds-of-christmas)

### Installation

This project is intended to be self-contained and uses
[Composer](http://getcomposer.org) to require
[PHPUnit](https://github.com/sebastianbergmann/phpunit/) as a project
dependency.

After cloning this repo and [installing
Composer](https://github.com/composer/composer#composer---dependency-management-for-php),
run `php composer.phar install` to install the project dependency.

### Running the tests

Run the tests by calling `./vendor/bin/phpunit` in the root of the project.

### Play along

-- THIS IS NOT YET COMPLETE

Run `git checkout testsonly` to switch to a branch containing the full repo, with defined (but empty) source classes
This will allow you to quickly get to grips with TDD, without having to write any tests! All you need to do, is follow the exercise's instructions, while keeping an eye on the tests for your current run to make sure you are creating the correct functions to allow the tests to pass.
Each test can be run individually, by running the individual test files `./vendor/bin/phpunit tests/library/Tdd/Day01CalcStatsTest`

