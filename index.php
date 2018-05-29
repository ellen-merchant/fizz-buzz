<?php

/**
 * Include the composer autoload file.
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * These values can be changed to a range between 1 and 100. Please ensure the $lowerNumber is less than the $upperNumber.
 * Both numbers cannot be equal.
 */
$lowerNumber = 1;
$upperNumber = 10;

$presentIntegerVariations = new \Ellen\PresentIntegerVariations($lowerNumber, $upperNumber);
echo $presentIntegerVariations->presentIntegers();