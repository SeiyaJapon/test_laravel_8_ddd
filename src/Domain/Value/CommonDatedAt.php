<?php

declare(strict_types=1);

namespace Src\Domain\Value;


use Exception;
use LogicException;

abstract class CommonDatedAt extends CommonMixedIntegerPositiveOrZero
{
    /** @var int $value */
    protected $value;

    /**
     * Updates the value.
     */
    public function update() {
        if (is_null($this->value())) {
            try {
                $this->value = new DateTime("now");
            } catch (Exception $e) {
                throw new LogicException();
            }
        }
    }
}
