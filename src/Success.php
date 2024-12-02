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
        protected ?string $message = null
    ) {
        parent::__construct(true, $message, $value, null, null, null);
    }
}
