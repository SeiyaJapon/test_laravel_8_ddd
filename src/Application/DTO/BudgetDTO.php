<?php

declare(strict_types=1);

namespace Src\Application\DTO;


final class BudgetDTO
{
    /** @var int */
    public $budgetId;

    /** @var float */
    public $totalAmount;

    /** @var int */
    public $createdAt;

    /** @var int */
    public $updatedAt;

    /** @var int */
    public $deletedAt;

    /** @var array */
    public $budgetLines;

    public function __construct(
        int $budgetId,
        array $budgetLines,
        float $totalAmount = 0.0,
        int $createdAt = null,
        int $updatedAt = null,
        int $deletedAt = null
    )
    {
        $this->budgetId = $budgetId;
        $this->budgetLines = $budgetLines;
        $this->totalAmount = $totalAmount;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    public function __toArray() : array
    {
        return [
            'budgetId' => $this->budgetId,
            'budgetLines' => $this->budgetLines,
            'totalAmount' => $this->totalAmount,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ];
    }
}
