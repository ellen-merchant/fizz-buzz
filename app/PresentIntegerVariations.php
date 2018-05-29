<?php

namespace Ellen;

class PresentIntegerVariations
{
    /**
     * @var int
     */
    private $lowerNumber;
    /**
     * @var int
     */
    private $upperNumber;

    /**
     * PresentIntegerVariations constructor.
     * @param int $lowerNumber
     * @param int $upperNumber
     */
    public function __construct(int $lowerNumber, int $upperNumber)
    {
        new ValidateIntegerRange($lowerNumber, $upperNumber);

        $this->lowerNumber = $lowerNumber;
        $this->upperNumber = $upperNumber;
    }

    /**
     * Loop from the first integer to the second integer. Write out each integer.
     * If the integer is divisible by 3 also print out “fizz” If the integer is divisible by 5 also print out “buzz”.
     * @return string
     */
    public function presentIntegers(): string
    {
        $display = "";
        for ($currentInteger = $this->lowerNumber; $currentInteger <= $this->upperNumber; $currentInteger++) {
            $display .= "{$currentInteger}\n";

            if ($this->isDivisibleBy($currentInteger, 3)) {
                $display .= "fizz\n";
            }

            if ($this->isDivisibleBy($currentInteger, 5)) {
                $display .= "buzz\n";
            }
        }

        return $display;
    }

    /**
     * Can the $currentInteger be divided by the $divisibleFactor?
     * @param int $currentInteger
     * @param int $divisibleFactor
     * @return bool
     */
    private function isDivisibleBy(int $currentInteger, int $divisibleFactor): bool
    {
        if ($currentInteger % $divisibleFactor == 0) {
            return true;
        }

        return false;
    }
}