<?php

declare(strict_types=1);

namespace Samueldmonteiro\Result;

/**
 * @template T
 * @extends Result<T>
 */
class Success extends Result
{
    /**
     * @param T $value
     */
    public function __construct(
        mixed $value,
        ?string $message = null,
        ?int $statusCode = 200
    ) {
        parent::__construct(true, $message, $value, null, $statusCode, null);
    }
}
