<?php

declare(strict_types=1);

namespace Src\Infraestructure\Repository\Invoice;

use App\Models\Budget as Invoice;
use App\Models\BudgetLine as InvoiceLine;
use Carbon\Carbon;
use Src\Domain\BudgetLine;
use Src\Domain\Budget;
use Src\Domain\Repository\InvoiceRepositoryInterface;
use Src\Domain\Value\Budget\BudgetId;
use Src\Domain\Value\Budget\BudgetTotalAmount;

class EloquentInvoiceRepository implements InvoiceRepositoryInterface
{
    /**
     * @param BudgetLine[] $budgetLines
     * @return Budget|null
     */
    public function createInvoices(array $budgetLines): ?Budget
    {
        $invoice = Invoice::create(
            [
                'total_amount' => 0.0,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
                'deleted_at' => null
            ]
        );

        $total = 0.0;

        foreach ($budgetLines as $line) {
            $vatAmount = $line['netAmount'] * $line['vat'] / 100;
            $totalLine = $line['netAmount'] + $vatAmount;
            $total += $totalLine;

            InvoiceLine::create(
                [
                    'budget_id' => $invoice->id,
                    'total_amount' => $totalLine,
                    'net_amount' => $line['netAmount'],
                    'vat_amount' => $vatAmount,
                    'vat' => $line['vat'],
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                    'deleted_at' => null
                ]
            );
        }

        $invoice->update(
            [
                'total_amount' => $total,
            ]
        );

        return new Budget(
            new BudgetId($invoice->id),
            new BudgetTotalAmount($total)
        );
    }

    public function getInvoiceById(BudgetId $id): ?Budget
    {
        $invoice = Invoice::find($id->value());

        return (!$invoice) ? null : new Budget(
            new BudgetId((int) $invoice->id),
            new BudgetTotalAmount((float) $invoice->total_amount)
        );
    }

    public function getInvoiceLinesByInvoiceId(BudgetId $id): ?array
    {
        return (Invoice::find($id->value())->lines)->toArray();
    }
}
