<?php

declare(strict_types=1);

namespace Src\Domain;



use Src\Domain\Value\Budget\BudgetId;
use Src\Domain\Value\BudgetLine\BudgetLineCreatedAt;
use Src\Domain\Value\BudgetLine\BudgetLineDeletedAt;
use Src\Domain\Value\BudgetLine\BudgetLineId;
use Src\Domain\Value\BudgetLine\BudgetLineNetAmount;
use Src\Domain\Value\BudgetLine\BudgetLineTotalAmount;
use Src\Domain\Value\BudgetLine\BudgetLineUpdatedAt;
use Src\Domain\Value\BudgetLine\BudgetLineVat;
use Src\Domain\Value\BudgetLine\BudgetLineVatAmount;

final class BudgetLine
{
    /** @var BudgetLine */
    private $id;
    /** @var BudgetId */
    private $bugetId;
    /** @var BudgetLineTotalAmount */
    private $totalAmount;
    /** @var BudgetLineNetAmount */
    private $netAmount;
    /** @var BudgetLineVatAmount */
    private $vatAmount;
    /** @var BudgetLineVat */
    private $vat;
    /** @var BudgetLineCreatedAt */
    private $createdAt;
    /** @var BudgetLineUpdatedAt */
    private $updatedAt;
    /** @var BudgetLineDeletedAt */
    private $deletedAt;

    public function __construct(
        BudgetLineId $id,
        BudgetId $bugetId,
        BudgetLineTotalAmount $totalAmount,
        BudgetLineNetAmount $netAmount,
        BudgetLineVatAmount $vatAmount,
        BudgetLineVat $vat,
        BudgetLineCreatedAt $createdAt,
        BudgetLineUpdatedAt $updatedAt,
        BudgetLineDeletedAt $deletedAt = null
    )
    {
        $this->id = $id;
        $this->bugetId = $bugetId;
        $this->totalAmount = $totalAmount;
        $this->netAmount = $netAmount;
        $this->vatAmount = $vatAmount;
        $this->vat = $vat;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    /**
     * @return BudgetLine
     */
    public function id(): BudgetLine
    {
        return $this->id;
    }

    /**
     * @return BudgetId
     */
    public function bugetId(): BudgetId
    {
        return $this->bugetId;
    }

    /**
     * @return BudgetLineTotalAmount
     */
    public function totalAmount(): BudgetLineTotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @return BudgetLineNetAmount
     */
    public function netAmount(): BudgetLineNetAmount
    {
        return $this->netAmount;
    }

    /**
     * @return BudgetLineVatAmount
     */
    public function vatAmount(): BudgetLineVatAmount
    {
        return $this->vatAmount;
    }

    /**
     * @return BudgetLineVat
     */
    public function vat(): BudgetLineVat
    {
        return $this->vat;
    }

    /**
     * @return BudgetLineCreatedAt
     */
    public function createdAt(): BudgetLineCreatedAt
    {
        return $this->createdAt;
    }

    /**
     * @return BudgetLineUpdatedAt
     */
    public function updatedAt(): BudgetLineUpdatedAt
    {
        return $this->updatedAt;
    }

    /**
     * @return BudgetLineDeletedAt
     */
    public function deletedAt(): BudgetLineDeletedAt
    {
        return $this->deletedAt;
    }

}
