<?php

declare(strict_types=1);

namespace Samueldmonteiro\Result;

/**
 * @template T
 */
class Result
{
    /**
     * Private construcor to enforce the use of static methods.
     *
     * @param bool $isSuccess
     * @param T|null $value
     * @param string|null $errorMessage
     * @param int|null $errorCode
     */
    public  function __construct(
        protected bool $isSuccess,
        protected ?string $message,
        protected mixed $value,
        protected ?string $errorMessage,
        protected ?int $errorCode,
        protected string|object|null $errorType
    ) {}

    /**
     * Creates a success result.
     *
     * @param T $value
     * @return self<T>
     */
    public static function success(mixed $value, ?string $message = null): self
    {
        return new self(true, $message, $value, null, null, null);
    }

    /**
     * Creates a failure result.
     *
     * @param string $errorMessage
     * @param int|null $errorCode
     * @return self<null>
     */
    public static function error(string $errorMessage, ?int $errorCode = null, string|object|null $errorType = null): self
    {
        return new self(false, null, null, $errorMessage, $errorCode, $errorType);
    }

    /**
     * Checks if the result is a success.
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    /**
     * Checks if the result is a failure.
     *
     * @return bool
     */
    public function isError(): bool
    {
        return !$this->isSuccess;
    }

    /**
     * Gets the value if the result is a success.
     *
     * @return T
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * Gets the message if the result is a success.
     *
     * @return ?string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Gets the error message if the result is a failure.
     *Samueldmonteiro
     * @return ?string
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    /**
     * Gets the error code if the result is a failure.
     *
     * @return ?int
     */
    public function getErrorCode(): ?int
    {
        return $this->errorCode;
    }

    /**
     * Gets the error type if the result is a failure.
     *
     * @return string|object|null
     */
    public function getErrorType(): string|object|null
    {
        return $this->errorType;
    }
}
