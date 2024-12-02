# Result Type

[![Maintainer](http://img.shields.io/badge/maintainer-@samueldmonteiro-blue.svg?style=flat-square)](https://www.linkedin.com/in/samuel-m-4a4432250/)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/samueldmonteiro/result-type.svg?style=flat-square)](https://packagist.org/packages/samueldmonteiro/result-type)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/samueldmonteiro/result-type.svg?style=flat-square)](https://packagist.org/packages/samueldmonteiro/result-type)

###### The result-type library introduces the Result Pattern to PHP, inspired by languages like Rust and Go. It provides a structured way to handle success and error outcomes explicitly, reducing reliance on exceptions. This approach makes your code more predictable, maintainable, and clear, ensuring every operation's result is properly managed.

A biblioteca result-type traz o padrão Result para o PHP, inspirada em linguagens como Rust e Go. Ela oferece uma maneira estruturada de lidar com sucessos e erros de forma explícita, reduzindo a dependência de exceções. Essa abordagem torna seu código mais previsível, manutenível e claro, garantindo que o resultado de cada operação seja devidamente tratado.

## Installation

```bash
composer require samueldmonteiro/result-type
```

## Documentation

#### Generics

###### Since PHP does not yet have native support for generics, we can solve this problem using dockblocks, to define what type of data is being returned when the operation is successful:

Como o PHP ainda não tem suporte nativo para generics, podemos resolver esse problema usando dockblocks para definir que tipo de dado será retornado quando a operação for bem-sucedida:

Ex: 
```php

/**
 * @return Result<float>
 */
function safeDivide(float $value): Result
{
    return $value;
}

```
### Usage

#### Using Class Instance:

```php
<?php

use Samueldmonteiro\Result\Error;
use Samueldmonteiro\Result\Result;
use Samueldmonteiro\Result\Success;

/**
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
    echo $result->getMessage() . PHP_EOL; 
    echo "Result: " . $result->getValue() . PHP_EOL;

} else {
    echo "Error: " . $result->getErrorMessage() . PHP_EOL; 
}
```

#### Using Static Methods:

```php

/**
 * @return Result<float>
 */
function safeDivide(float $a, float $b): Result
{
    if ($b === 0.0) {
        return Result::error('Division by zero is not allowed.');
    }

    return Result::success(($a / $b, 'Division successful.');
}
```

#### Other Methods:

```php
<?php

use Samueldmonteiro\Result\Success;

$result = New Error('error in application', 500, 'SERVER_ERROR');

if (!$result->isError()) {
    echo $result->getMessage() . PHP_EOL; 
    echo "Result: " . $result->getValue() . PHP_EOL;

} else {
    echo "Error: " . $result->getErrorMessage() . PHP_EOL;
    echo "Error Code: " . $result->getErrorCode() . PHP_EOL; 
    echo "Error Type: " . $result->getErrorType() . PHP_EOL; 

}
```


## Credits

- [Samuel Monteiro](https://github.com/samueldmonteiro) (Developer)
- [All Contributors](https://github.com/samueldmonteiro/result-type/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/samueldmonteiro/result-type/blob/main/LICENSE) for more
information.
