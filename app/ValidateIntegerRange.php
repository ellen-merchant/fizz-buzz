<?php

namespace Ellen;

class ValidateIntegerRange
{
    /**
     * @var int
     */
    private $lowerRangeLimit;
    /**
     * @var int
     */
    private $upperRangeLimit;
    /**
     * @var int
     */
    private $lowerNumber;
    /**
     * @var int
     */
    private $upperNumber;

    /**
     * Ensures the integers provided are correct.
     * @param int $lowerNumber
     * @param int $upperNumber
     * @param int $lowerRangeLimit
     * @param int $upperRangeLimit
     */
    public function __construct(int $lowerNumber, int $upperNumber, int $lowerRangeLimit = 1, $upperRangeLimit = 100)
    {
        $this->lowerNumber = $lowerNumber;
        $this->upperNumber = $upperNumber;
        $this->lowerRangeLimit = $lowerRangeLimit;
        $this->upperRangeLimit = $upperRangeLimit;

        $this->validateLowerNumber();
        $this->validateNumberRange();
        $this->validateUpperNumber();
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function validateLowerNumber()
    {
        if ($this->lowerNumber < $this->lowerRangeLimit) {
            throw new \InvalidArgumentException("The lower number needs to be more than 1. {$this->getExceptionMessage()}");
        }
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function validateNumberRange()
    {
        if ($this->upperNumber < $this->lowerNumber) {
            throw new \InvalidArgumentException("The upper number needs to be more than the lower number. {$this->getExceptionMessage()}");
        }

        if ($this->lowerNumber == $this->upperNumber) {
            throw new \InvalidArgumentException("The both numbers can not be equal to each other. {$this->getExceptionMessage()}");
        }
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function validateUpperNumber()
    {
        if ($this->upperNumber > $this->upperRangeLimit) {
            throw new \InvalidArgumentException("The upper number needs to be less than 100. {$this->getExceptionMessage()}");
        }
    }

    /**
     * Display numbers on all exception messages, for better debugging.
     * @return string
     */
    private function getExceptionMessage(): string
    {
        return "Lower number provided: {$this->lowerNumber}. Upper number provided: {$this->upperNumber}.";
    }


}