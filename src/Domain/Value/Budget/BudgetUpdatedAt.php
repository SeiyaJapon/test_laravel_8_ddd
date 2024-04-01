<?php

declare(strict_types=1);

namespace Src\Domain\Value\Budget;


use Exception;
use Src\Domain\Value\CommonDatedAt;

final class BudgetUpdatedAt extends CommonDatedAt
{
    /**
     * BudgetgId constructor.
     *
     *
     * @param \DateTime $value
     * @throws Exception
     */
    public function __construct(\DateTime $value)
    {
        try {
            parent::__construct($value->getTimestamp());
        } catch (Exception $e) {
            throw new Exception($value, $e->getCode(), $e);
        }
    }
}
