<?php

/** @noinspection PhpDocMissingThrowsInspection */

/** @noinspection PhpUnhandledExceptionInspection */

namespace Tests\Application\Service;

use Carbon\Carbon;
use PHPUnit\Framework\MockObject\MockObject;
use Src\Application\DTO\BudgetDTO;
use Src\Application\Service\CreateInvoiceService;
use PHPUnit\Framework\TestCase;
use Src\Domain\Budget;
use Src\Domain\BudgetLine;
use Src\Domain\Exception\InvalidBudgetIdException;
use Src\Domain\Repository\InvoiceRepositoryInterface;
use Src\Domain\Value\Budget\BudgetId;
use Src\Domain\Value\Budget\BudgetTotalAmount;
use Src\Domain\Value\BudgetLine\BudgetLineCreatedAt;
use Src\Domain\Value\BudgetLine\BudgetLineId;
use Src\Domain\Value\BudgetLine\BudgetLineNetAmount;
use Src\Domain\Value\BudgetLine\BudgetLineTotalAmount;
use Src\Domain\Value\BudgetLine\BudgetLineUpdatedAt;
use Src\Domain\Value\BudgetLine\BudgetLineVat;
use Src\Domain\Value\BudgetLine\BudgetLineVatAmount;

class CreateInvoiceServiceTest extends TestCase
{
    private const VALID_BUDGET_ID_1 = 1;
    private const VALID_BUDGET_LINE_ID_1 = 1;
    private const VALID_INITIAL_NET_AMOUNT_1 = 29.30;
    private const VALID_INITIAL_VAT_1 = 1.5;
    private const VALID_BUDGET_ID_2 = 2;
    private const VALID_BUDGET_LINE_ID_2 = 2;
    private const VALID_INITIAL_NET_AMOUNT_2 = 39.30;
    private const VALID_INITIAL_VAT_2 = 2.5;

    /** @var MockObject|InvoiceRepositoryInterface */
    private $invoiceRepositoryInterface;

    /** @var CreateInvoiceService */
    private CreateInvoiceService $createInvoiceService;

    /** @var BudgetLine[] */
    private array $lines;

    protected function setUp() : void
    {
        $this->invoiceRepositoryInterface = self::createMock(InvoiceRepositoryInterface::class);

        $this->createInvoiceService = new CreateInvoiceService($this->invoiceRepositoryInterface);

        $vatAmount = self::VALID_INITIAL_NET_AMOUNT_1 * self::VALID_INITIAL_VAT_1 / 100;
        $totalAmount = self::VALID_INITIAL_NET_AMOUNT_1 + $vatAmount;

        $vatAmount2 = self::VALID_INITIAL_NET_AMOUNT_2 * self::VALID_INITIAL_VAT_2 / 100;
        $totalAmount2 = self::VALID_INITIAL_NET_AMOUNT_2 + $vatAmount2;

        $this->lines = [
            new BudgetLine(
                new BudgetLineId(self::VALID_BUDGET_LINE_ID_1),
                new BudgetId(self::VALID_BUDGET_ID_1),
                new BudgetLineTotalAmount($totalAmount),
                new BudgetLineNetAmount(self::VALID_INITIAL_NET_AMOUNT_1),
                new BudgetLineVatAmount($vatAmount),
                new BudgetLineVat(self::VALID_INITIAL_VAT_1),
                new BudgetLineCreatedAt(Carbon::now()->getTimestamp()),
                new BudgetLineUpdatedAt(Carbon::now()->getTimestamp())
            ),
            new BudgetLine(
                new BudgetLineId(self::VALID_BUDGET_LINE_ID_2),
                new BudgetId(self::VALID_BUDGET_ID_2),
                new BudgetLineTotalAmount($totalAmount2),
                new BudgetLineNetAmount(self::VALID_INITIAL_NET_AMOUNT_2),
                new BudgetLineVatAmount($vatAmount2),
                new BudgetLineVat(self::VALID_INITIAL_VAT_2),
                new BudgetLineCreatedAt(Carbon::now()->getTimestamp()),
                new BudgetLineUpdatedAt(Carbon::now()->getTimestamp())
            )
        ];
    }

    public function testExecuteShouldReturnABudgetDTO()
    {
        $this->invoiceRepositoryInterface
            ->expects(self::once())
            ->method('createInvoices')
            ->willReturn(
                new Budget(
                    new BudgetId(self::VALID_BUDGET_ID_1),
                    new BudgetTotalAmount(self::VALID_INITIAL_NET_AMOUNT_1)
                )
            );

        $result = $this->createInvoiceService->execute($this->lines);

        self::assertInstanceOf(BudgetDTO::class, $result);
    }

    public function testExecuteShouldThrowAnException()
    {
        $this->invoiceRepositoryInterface
            ->expects(self::once())
            ->method('createInvoices')
            ->willThrowException(new InvalidBudgetIdException(self::VALID_BUDGET_ID_1));

        self::expectException(InvalidBudgetIdException::class);
    }
}
