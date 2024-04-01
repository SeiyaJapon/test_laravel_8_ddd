<?php

declare(strict_types=1);

namespace Src\Domain\Value\Budget;


use Src\Domain\Exception\InvalidBudgetIdException;
use Src\Domain\Exception\InvalidCommonIdException;
use Src\Domain\Value\CommonId;

final class BudgetId extends CommonId
{
    /**
     * BudgetgId constructor.
     *
     * @param int $value a budget ID value
     *
     * @throws InvalidBudgetIdException
     */
    public function __construct(int $value)
    {
        try {
            parent::__construct($value);
        } catch (InvalidCommonIdException $e) {
            throw new InvalidBudgetIdException($value, $e->getCode(), $e);
        }
    }
}
