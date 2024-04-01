<?php

declare(strict_types=1);

namespace Src\Domain;

use Exception;
use Src\Domain\Value\Budget\BudgetCreatedAt;
use Src\Domain\Value\Budget\BudgetDeletedAt;
use Src\Domain\Value\Budget\BudgetId;
use Src\Domain\Value\Budget\BudgetTotalAmount ;
use Src\Domain\Value\Budget\BudgetUpdatedAt;

final class Budget
{
    /** @var BudgetId */
    private $id;

    /** @var BudgetTotalAmount */
    private $totalAmount;

    /** @var BudgetCreatedAt */
    private $createdAt;

    /** @var BudgetUpdatedAt */
    private $updatedAt;

    /** @var BudgetDeletedAt */
    private $deletedAt;

    /** @var BudgetLine[] */
    private $budgetLines;

    /**
     * Budget constructor.
     *
     * @param BudgetId          $id
     * @param BudgetTotalAmount $totalAmount
     */
    public function __construct(
        BudgetId $id,
        BudgetTotalAmount $totalAmount
    )
    {
        $this->id = $id;
        $this->totalAmount = $totalAmount;
        $this->createdAt = date('c');
        $this->updatedAt = date('c');
    }

    /**
     * @return BudgetId
     */
    public function id(): BudgetId
    {
        return $this->id;
    }

    /**
     * @return BudgetTotalAmount
     */
    public function totalAmount(): BudgetTotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @return BudgetCreatedAt
     * @throws Exception
     */
    public function createdAt(): BudgetCreatedAt
    {
        return new BudgetCreatedAt(\DateTime::createFromFormat(\DateTime::ATOM, $this->createdAt));
    }

    /**
     * @return BudgetUpdatedAt
     * @throws Exception
     */
    public function updatedAt(): BudgetUpdatedAt
    {
        return new BudgetUpdatedAt(\DateTime::createFromFormat(\DateTime::ATOM, $this->updatedAt));
    }

    /**
     * @return BudgetDeletedAt
     * @throws Exception
     */
    public function deletedAt(): BudgetDeletedAt
    {
        return new BudgetDeletedAt(\DateTime::createFromFormat(\DateTime::ATOM, $this->deletedAt));
    }

    /**
     * @return BudgetLine[]
     */
    public function budgetLines(): array
    {
        return $this->budgetLines;
    }
}
