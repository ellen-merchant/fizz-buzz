<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Ellen\ValidateIntegerRange;

class ValidateIntegerRangeTest extends TestCase
{
    /**
     * https://phpunit.de/manual/3.7/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers
     * @return array
     */
    public function provideLowerRangeNumbersThatShouldFail()
    {
        return [
            [0],
            [-1],
            [-100]
        ];
    }

    /**
     * @dataProvider provideLowerRangeNumbersThatShouldFail
     * @param $lowerNumberThatShouldFail
     * @test
     */
    public function testLowerRangeIntegerIsMoreThanOne($lowerNumberThatShouldFail): void
    {
        $upperNumber = 99;

        $this->expectException(\InvalidArgumentException::class);

        $this->expectExceptionMessage("The lower number needs to be more than 1. Lower number provided: {$lowerNumberThatShouldFail}. Upper number provided: {$upperNumber}.");

        new ValidateIntegerRange($lowerNumberThatShouldFail, $upperNumber);
    }

    /**
     * https://phpunit.de/manual/3.7/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers
     * @return array
     */
    public function provideUpperRangeNumbersThatShouldFail()
    {
        return [
            [101],
            [1000000000],
        ];
    }

    /**
     * @dataProvider provideUpperRangeNumbersThatShouldFail
     * @param $upperNumberThatShouldFail
     * @test
     */
    public function testUpperRangeIntegerIsLessThanOneHundred($upperNumberThatShouldFail): void
    {
        $lowerNumber = 1;

        $this->expectException(\InvalidArgumentException::class);

        $this->expectExceptionMessage("The upper number needs to be less than 100. Lower number provided: {$lowerNumber}. Upper number provided: {$upperNumberThatShouldFail}.");

        new ValidateIntegerRange($lowerNumber, $upperNumberThatShouldFail);
    }

    /**
     * https://phpunit.de/manual/3.7/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers
     * @return array
     */
    public function provideNumberRangesThatShouldFail()
    {
        return [
            [99, 1],
            [51, 50],
        ];
    }

    /**
     * @dataProvider provideNumberRangesThatShouldFail
     * @test
     * @param $lowerNumber
     * @param $upperNumber
     */
    public function testUpperNumberIsMoreThanLowerNumber($lowerNumber, $upperNumber): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->expectExceptionMessage("The upper number needs to be more than the lower number. Lower number provided: {$lowerNumber}. Upper number provided: {$upperNumber}.");

        new ValidateIntegerRange($lowerNumber, $upperNumber);
    }

    /**
     * @test
     * @param $lowerNumber
     * @param $upperNumber
     */
    public function testUpperNumberDoesNotEqualLowerNumber(): void
    {
        $lowerNumber = 50;
        $upperNumber = 50;

        $this->expectException(\InvalidArgumentException::class);

        $this->expectExceptionMessage("The both numbers can not be equal to each other. Lower number provided: {$lowerNumber}. Upper number provided: {$upperNumber}.");

        new ValidateIntegerRange($lowerNumber, $upperNumber);
    }
}
