<?php

declare(strict_types=1);

namespace Src\Domain\Repository;


use Src\Domain\BudgetLine;
use Src\Domain\Budget;
use Src\Domain\Value\Budget\BudgetId;

interface InvoiceRepositoryInterface
{
    /**
     * @param BudgetLine[] $budgetLines
     * @return Budget|null
     */
    public function createInvoices(array $budgetLines) : ?Budget;

    /**
     * @param BudgetId $id
     * @return Budget|null
     */
    public function getInvoiceById(BudgetId $id) : ?Budget;

    /**
     * @param BudgetId $id
     * @return array|null
     */
    public function getInvoiceLinesByInvoiceId(BudgetId $id) : ?array;
}
