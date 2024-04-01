<?php

declare(strict_types=1);

namespace Src\Domain\Value;

use Src\Domain\Exception\InvalidCommonIdException;
use Src\Domain\Exception\InvalidCommonMixedIntegerPositiveOrZeroException;

abstract class CommonId extends CommonMixedIntegerPositiveOrZero {
    /**
     * CommonId constructor.
     *
     * @param int $value an ID value
     *
     * @throws InvalidCommonIdException
     */
    public function __construct(int $value) {
        try {
            parent::__construct($value);
        } catch (InvalidCommonMixedIntegerPositiveOrZeroException $e) {
            throw new InvalidCommonIdException($value, $e->getCode(), $e);
        }
    }
}
