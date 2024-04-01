<?php

namespace Tests\Application\Service;

use PHPUnit\Framework\MockObject\MockObject;
use Src\Application\Service\GetInvoiceByIdService;
use PHPUnit\Framework\TestCase;
use Src\Domain\Budget;
use Src\Domain\BudgetLine;
use Src\Domain\Repository\InvoiceRepositoryInterface;
use Src\Domain\Value\Budget\BudgetId;
use Src\Domain\Value\Budget\BudgetTotalAmount;

class GetInvoiceByIdServiceTest extends TestCase
{
    private const VALID_BUDGET_ID = 1;
    private const VALID_INITIAL_TOTAL_AMOUNT = 100.5;

    /** @var MockObject|InvoiceRepositoryInterface */
    private $invoiceRepositoryInterface;

    /** @var GetInvoiceByIdService */
    private GetInvoiceByIdService $getInvoiceByIdService;

    /** @var BudgetLine[] */
    private array $lines;

    protected function setUp() : void
    {
        $this->invoiceRepositoryInterface = self::createMock(InvoiceRepositoryInterface::class);

        $this->getInvoiceByIdService = new GetInvoiceByIdService($this->invoiceRepositoryInterface);
    }

    public function testExecuteShouldReturnAnArray()
    {
        $this->invoiceRepositoryInterface
            ->expects(self::once())
            ->method('getInvoiceLinesByInvoiceId')
            ->willReturn(array());

        $this->invoiceRepositoryInterface
            ->expects(self::once())
            ->method('getInvoiceById')
            ->willReturn(
                new Budget(
                    new BudgetId(self::VALID_BUDGET_ID),
                    new BudgetTotalAmount(self::VALID_INITIAL_TOTAL_AMOUNT)
                )
            );

        $result = $this->getInvoiceByIdService->execute(
            new BudgetId(self::VALID_BUDGET_ID)
        );

        self::assertIsArray($result);
    }
}
