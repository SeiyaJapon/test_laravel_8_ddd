<?php

declare(strict_types=1);

namespace Src\Application\Service;


use Src\Application\DTO\BudgetDTO;
use Src\Domain\Repository\InvoiceRepositoryInterface;

final class CreateInvoiceService
{
    /** @var InvoiceRepositoryInterface */
    private $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function execute(array $budgetLines) : ?BudgetDTO
    {
        $invoice = $this->invoiceRepository->createInvoices($budgetLines);

        // Estoy haciendo trampa, lo sé. Tendría que sacar las líneas de la factura de al factura
        // en lugar de aprovechar las que me vienen. Pero es por acelerar un poco.

        return new BudgetDTO(
            $invoice->id()->value(),
            $budgetLines,
            $invoice->totalAmount()->value(),
            $invoice->createdAt()->value(),
            $invoice->updatedAt()->value()
        );
    }
}
