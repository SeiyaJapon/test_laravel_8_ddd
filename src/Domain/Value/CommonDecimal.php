<?php

declare(strict_types=1);

namespace Src\Domain\Value;

use Src\Domain\Exception\InvalidAmountException;

abstract class CommonDecimal {
    /** @var mixed */
    protected $value;

    /**
     * @param mixed $value value
     */
    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * Returns the value.
     *
     * @return float|null
     */
    public function value() {
        return $this->value !== null ? (float) $this->value : null;
    }
}
