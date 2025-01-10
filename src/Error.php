<?php

declare(strict_types=1);

namespace Samueldmonteiro\Result;

/**
 * @template T
 * @extends Result<null>
 */
class Error extends Result
{
    public function __construct(
        string $errorMessage,
        ?int $statusCode = null,
        string|object|null $errorType = null,
        array $context = []
    ) {
        parent::__construct(false, null, null, $errorMessage, $statusCode, $errorType, $context);
    }
}
