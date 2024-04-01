<?php

declare(strict_types=1);

namespace Src\Application\Service;


use Src\Application\DTO\BudgetDTO;
use Src\Domain\Repository\InvoiceRepositoryInterface;
use Src\Domain\Value\Budget\BudgetId;

final class GetInvoiceByIdService
{
    /** @var InvoiceRepositoryInterface */
    private InvoiceRepositoryInterface $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function execute(BudgetId $id) : array
    {
        $lines = $this->invoiceRepository->getInvoiceLinesByInvoiceId($id);
        $budget = $this->invoiceRepository->getInvoiceById($id);
        $dto = new BudgetDTO(
            $budget->id()->value(),
            $lines,
            $budget->totalAmount()->value(),
            $budget->createdAt()->value(),
            $budget->updatedAt()->value()
        );

        return (!$budget) ? [] : $dto->__toArray();
    }
}
