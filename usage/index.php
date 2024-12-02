<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Samueldmonteiro\Result\Error;
use Samueldmonteiro\Result\Result;
use Samueldmonteiro\Result\Success;

/**
 * Function to safely divide two numbers
 *
 * @param float $a
 * @param float $b
 * @return Result<float>
 */
function safeDivide(float $a, float $b): Result
{
    if ($b === 0.0) {
        // Return an error if division by zero
        return new Error('Division by zero is not allowed.');
    }
    return new Success($a / $b, 'Division successful.');
}

// Example usage
$result = safeDivide(10, 2);

if ($result->isSuccess()) {
    echo $result->getMessage() . PHP_EOL; // "Division successful."
    echo "Result: " . $result->getValue() . PHP_EOL; // "Result: 5"

} else {
    echo "Error: " . $result->getErrorMessage() . PHP_EOL;
}
