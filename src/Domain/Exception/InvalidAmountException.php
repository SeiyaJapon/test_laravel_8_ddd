<?php

declare(strict_types=1);

namespace Src\Domain\Exception;


use DomainException;
use Throwable;

final class InvalidAmountException extends DomainException
{
    /**
     * InvalidCommonIntegerPositiveException constructor.
     *
     * @param mixed          $value    Value
     * @param int            $code     exception code
     * @param Throwable|null $previous previous exception
     */
    public function __construct($value, $code = 0, Throwable $previous = null)
    {
        parent::__construct("Invalid total amount: {$value}", $code, $previous);
    }
}
