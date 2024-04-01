<?php

declare(strict_types=1);

namespace Src\Domain\Exception;


use DomainException;
use Throwable;

final class InvalidBudgetIdException extends DomainException
{
    public function __construct(int $id, int $code = 0, Throwable $previous = null)
    {
        parent::__construct("Invalid budget ID: {$id}", $code, $previous);
    }
}
