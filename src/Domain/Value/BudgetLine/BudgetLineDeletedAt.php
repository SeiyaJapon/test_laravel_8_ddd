<?php

declare(strict_types=1);

namespace Src\Domain\Value\BudgetLine;


use Exception;
use Src\Domain\Value\CommonDatedAt;

final class BudgetLineDeletedAt extends CommonDatedAt
{
    /**
     * BudgetgId constructor.
     *
     *
     * @param int $value
     * @throws Exception
     */
    public function __construct(int $value)
    {
        try {
            parent::__construct($value);
        } catch (Exception $e) {
            throw new Exception($value, $e->getCode(), $e);
        }
    }
}
