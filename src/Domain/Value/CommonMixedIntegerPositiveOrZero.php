<?php

declare(strict_types=1);

namespace Src\Domain\Value;

use Src\Domain\Exception\InvalidCommonMixedIntegerPositiveOrZeroException;

abstract class CommonMixedIntegerPositiveOrZero extends CommonMixedInteger {
    /**
     * @param mixed $value value
     *
     * @throws InvalidCommonMixedIntegerPositiveOrZeroException
     */
    public function __construct($value) {
        if (!is_numeric($value)) {
            throw new InvalidCommonMixedIntegerPositiveOrZeroException($value);
        }

        if ($value <= -1) {
            throw new InvalidCommonMixedIntegerPositiveOrZeroException($value);
        }

        parent::__construct($value);
    }
}
