<?php

declare(strict_types=1);

namespace Src\Application\DTO;


use DateTime;

final class BudgetLineDTO
{
    /** @var int */
    public $id;

    /** @var float */
    public $totalAmount;

    /** @var float */
    public $netAmount;

    /** @var float */
    public $vatAmount;

    /** @var float */
    public $vat;

    /** @var DateTime */
    public $createdAt;

    /** @var DateTime */
    public $updatedAt;

    /** @var DateTime */
    public $deletedAt;

    public function __construct(
        int $id,
        int $bugetId,
        float $totalAmount,
        float $netAmount,
        float $vatAmount,
        float $vat,
        DateTime $createdAt,
        DateTime $updatedAt,
        DateTime $deletedAt
    )
    {
        $this->id = $id;
        $this->totalAmount = $totalAmount;
        $this->netAmount = $netAmount;
        $this->vatAmount = $vatAmount;
        $this->vat = $vat;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    public function __toArray() : array
    {
        return [
            'id' => $this->id,
            'totalAmount' => $this->totalAmount,
            'netAmount' => $this->netAmount,
            'vatAmount' => $this->vatAmount,
            'vat' => $this->vat,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'deletedAt' => $this->deletedAt,
        ];
    }
}
