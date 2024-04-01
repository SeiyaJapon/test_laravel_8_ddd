<?php

declare(strict_types=1);

namespace Src\Domain\Exception;


use DomainException;
use Throwable;

final class InvalidCommonDateTimeException extends DomainException {
    /**
     * InvalidCommonDateTimeException constructor.
     *
     * @param string         $value    An invalid date/time value
     * @param int            $code     An exception code
     * @param Throwable|null $previous A previous exception
     */
    public function __construct(string $value, int $code = 0, Throwable $previous = null) {
        parent::__construct("Invalid date time: '{$value}'", $code, $previous);
    }
}
