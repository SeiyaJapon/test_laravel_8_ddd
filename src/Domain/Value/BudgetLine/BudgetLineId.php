<?php

declare(strict_types=1);

namespace Src\Domain\Value\BudgetLine;


use Src\Domain\Exception\InvalidBudgetLineIdException;
use Src\Domain\Exception\InvalidCommonIdException;
use Src\Domain\Value\CommonId;

final class BudgetLineId extends CommonId
{
    public function __construct(int $value)
    {
        try {
            parent::__construct($value);
        } catch (InvalidCommonIdException $e) {
            throw new InvalidBudgetLineIdException($value, $e->getCode(), $e);
        }
    }
}
