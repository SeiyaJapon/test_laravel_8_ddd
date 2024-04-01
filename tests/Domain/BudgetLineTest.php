<?php

/** @noinspection PhpDocMissingThrowsInspection */

/** @noinspection PhpUnhandledExceptionInspection */

namespace Tests\Domain;

use Carbon\Carbon;
use Src\Domain\BudgetLine;
use PHPUnit\Framework\TestCase;
use Src\Domain\Value\Budget\BudgetId;
use Src\Domain\Value\BudgetLine\BudgetLineCreatedAt;
use Src\Domain\Value\BudgetLine\BudgetLineId;
use Src\Domain\Value\BudgetLine\BudgetLineNetAmount;
use Src\Domain\Value\BudgetLine\BudgetLineTotalAmount;
use Src\Domain\Value\BudgetLine\BudgetLineUpdatedAt;
use Src\Domain\Value\BudgetLine\BudgetLineVat;
use Src\Domain\Value\BudgetLine\BudgetLineVatAmount;

class BudgetLineTest extends TestCase
{
    private const VALID_BUDGET_ID = 1;
    private const VALID_BUDGET_LINE_ID = 1;
    private const VALID_INITIAL_NET_AMOUNT = 29.30;
    private const VALID_INITIAL_VAT = 1.5;

    /**
     * Tests that constructor should create a valid object.
     */
    public function testShouldCreateAValidObject() {
        $vatAmount = self::VALID_INITIAL_NET_AMOUNT * self::VALID_INITIAL_VAT / 100;
        $totalAmount = self::VALID_INITIAL_NET_AMOUNT + $vatAmount;

        $budgetLine = new BudgetLine(
            new BudgetLineId(self::VALID_BUDGET_LINE_ID),
            new BudgetId(self::VALID_BUDGET_ID),
            new BudgetLineTotalAmount($totalAmount),
            new BudgetLineNetAmount(self::VALID_INITIAL_NET_AMOUNT),
            new BudgetLineVatAmount($vatAmount),
            new BudgetLineVat(self::VALID_INITIAL_VAT),
            new BudgetLineCreatedAt(Carbon::now()->getTimestamp()),
            new BudgetLineUpdatedAt(Carbon::now()->getTimestamp())
        );

        self::assertNotNull($budgetLine);
        self::assertInstanceOf(BudgetLine::class, $budgetLine);
    }
}
