<?php

declare(strict_types=1);

namespace Src\Domain\Exception;


use DomainException;
use Throwable;

final class InvalidCommonIdException extends DomainException {
    /**
     * InvalidCommonIdException constructor.
     *
     * @param int            $id       ID value
     * @param int            $code     Exception code
     * @param Throwable|null $previous Previous exception
     */
    public function __construct(int $id, int $code = 0, Throwable $previous = null) {
        parent::__construct("Invalid ID: {$id}", $code, $previous);
    }
}
