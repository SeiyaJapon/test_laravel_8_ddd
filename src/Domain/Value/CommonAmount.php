<?php

declare(strict_types=1);

namespace Src\Domain\Value;


use Src\Domain\Exception\InvalidAmountException;
use Src\Domain\Exception\InvalidCommonDecimalException;

abstract class CommonAmount extends CommonDecimal
{
    public function __construct(float $value)
    {
        try {
            parent::__construct($value);
        } catch (InvalidCommonDecimalException $e) {
            throw new InvalidAmountException($value, $e->getCode(), $e);
        }
    }
}
