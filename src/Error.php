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
        ?int $errorCode = null,
        string|object|null $errorType = null
    ) {
        parent::__construct(false, null, null, $errorMessage, $errorCode, $errorType);
    }
}
