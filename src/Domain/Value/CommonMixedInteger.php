<?php

declare(strict_types=1);

namespace Src\Domain\Value;

abstract class CommonMixedInteger {
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
     * @return int|null
     */
    public function value() {
        return $this->value !== null ? (int) $this->value : null;
    }
}
