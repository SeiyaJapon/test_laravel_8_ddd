<?php

/** @noinspection PhpDocMissingThrowsInspection */

/** @noinspection PhpUnhandledExceptionInspection */

namespace Tests\Domain;

use Src\Domain\Budget;
use PHPUnit\Framework\TestCase;
use Src\Domain\Value\Budget\BudgetId;
use Src\Domain\Value\Budget\BudgetTotalAmount;

class BudgetTest extends TestCase
{
    private const VALID_BUDGET_ID = 1;
    private const VALID_INITIAL_TOTAL_AMOUNT = 100.5;

    /**
     * Tests that constructor should create a valid object.
     */
    public function testShouldCreateAValidObject() {
        $budget = new Budget(
            new BudgetId(self::VALID_BUDGET_ID),
            new BudgetTotalAmount(self::VALID_INITIAL_TOTAL_AMOUNT)
        );

        self::assertNotNull($budget);
        self::assertInstanceOf(Budget::class, $budget);
    }
}
