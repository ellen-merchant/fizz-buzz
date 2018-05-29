<?php

namespace Tests;

use Ellen\PresentIntegerVariations;
use PHPUnit\Framework\TestCase;

class PresentIntegerVariationsTest extends TestCase
{
    /**
     * Tests business requirement: Loop from the first integer to the second integer. Write out each integer.
     * @test
     */
    public function testIntegersArePresented()
    {
        $testNumberRanges = (object)[
            (object)['lowerNumber' => 1, 'upperNumber' => 100],
            (object)['lowerNumber' => 1, 'upperNumber' => 10],
            (object)['lowerNumber' => 50, 'upperNumber' => 51],
            (object)['lowerNumber' => 20, 'upperNumber' => 59],
        ];

        foreach ($testNumberRanges as $testNumberRange) {
            $testingClass = new PresentIntegerVariations($testNumberRange->lowerNumber, $testNumberRange->upperNumber);
            $result = $testingClass->presentIntegers();

            for ($currentInteger = $testNumberRange->lowerNumber; $currentInteger <= $testNumberRange->upperNumber; $currentInteger++) {
                $this->assertContains((string)$currentInteger ."\n", $result);
            }
        }
    }

    /**
     * Tests business requirement: Loop from the first integer to the second integer. Write out each integer.
     * If the integer is divisible by 3 also print out “fizz”.
     * @test
     */
    public function testIntegerDivisibleByThreeDisplaysFizz()
    {
        $testNumberRanges = (object)[
            (object)['lowerNumber' => 1, 'upperNumber' => 100, 'numberOfMatches' => 33],
            (object)['lowerNumber' => 1, 'upperNumber' => 10, 'numberOfMatches' => 3],
            (object)['lowerNumber' => 49, 'upperNumber' => 50, 'numberOfMatches' => 0],
            (object)['lowerNumber' => 48, 'upperNumber' => 51, 'numberOfMatches' => 2],
            (object)['lowerNumber' => 20, 'upperNumber' => 59, 'numberOfMatches' => 13],
        ];

        foreach ($testNumberRanges as $testNumberRange) {
            $testingClass = new PresentIntegerVariations($testNumberRange->lowerNumber, $testNumberRange->upperNumber);
            $result = $testingClass->presentIntegers();

            $this->assertEquals($testNumberRange->numberOfMatches, substr_count($result, "fizz"));
        }
    }

    /**
     * Tests business requirement: Loop from the first integer to the second integer. Write out each integer.
     * If the integer is divisible by 5 also print out “buzz”.
     * @test
     */
    public function testIntegerDivisibleByFiveDisplaysBuzz()
    {
        $testNumberRanges = (object)[
            (object)['lowerNumber' => 1, 'upperNumber' => 100, 'numberOfMatches' => 20],
            (object)['lowerNumber' => 1, 'upperNumber' => 10, 'numberOfMatches' => 2],
            (object)['lowerNumber' => 47, 'upperNumber' => 49, 'numberOfMatches' => 0],
            (object)['lowerNumber' => 35, 'upperNumber' => 40, 'numberOfMatches' => 2],
            (object)['lowerNumber' => 20, 'upperNumber' => 59, 'numberOfMatches' => 8],
        ];

        foreach ($testNumberRanges as $testNumberRange) {
            $testingClass = new PresentIntegerVariations($testNumberRange->lowerNumber, $testNumberRange->upperNumber);
            $result = $testingClass->presentIntegers();

            $this->assertEquals($testNumberRange->numberOfMatches, substr_count($result, "buzz"));
        }
    }

    /**
     * Tests business requirement: Loop from the first integer to the second integer. Write out each integer.
     * If the integer is divisible by 3 also print out “fizz” . If the integer is divisible by 5 also print out “buzz”.
     * @test
     */
    public function testIntegerDivisibleByThreeAndFiveDisplaysFizzAndBuzz()
    {
        $testNumberRanges = (object)[
            (object)['lowerNumber' => 1, 'upperNumber' => 100, 'numberOfMatches' => 6],
            (object)['lowerNumber' => 1, 'upperNumber' => 10, 'numberOfMatches' => 0],
            (object)['lowerNumber' => 15, 'upperNumber' => 20, 'numberOfMatches' => 1],
            (object)['lowerNumber' => 20, 'upperNumber' => 59, 'numberOfMatches' => 2],
        ];

        foreach ($testNumberRanges as $testNumberRange) {
            $testingClass = new PresentIntegerVariations($testNumberRange->lowerNumber, $testNumberRange->upperNumber);
            $result = $testingClass->presentIntegers();

            $this->assertEquals($testNumberRange->numberOfMatches, substr_count($result, "fizz\nbuzz"));
        }
    }
}
