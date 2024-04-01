<?php

declare(strict_types=1);

namespace Src\Domain\Exception;


use DomainException;
use Throwable;

final class InvalidBudgetLineIdException extends DomainException
{
    /**
     * InvalidBudgetIdException constructor.
     *
     * @param int            $id       an invalid budget ID
     * @param int            $code     exception code
     * @param Throwable|null $previous previous exception
     */
    public function __construct(int $id, int $code = 0, Throwable $previous = null)
    {
        parent::__construct("Invalid budget line ID: {$id}", $code, $previous);
    }
}
