<?php

declare(strict_types=1);

namespace Src\Domain\Value;


use DateTime;
use Exception;
use Src\Domain\Exception\InvalidCommonDateTimeException;

class CommonDateTime
{
    /**
     * @var DateTime
     */
    protected $value;

    /**
     * CommonDateTime constructor.
     *
     * @param DateTime|null $dateTime DateTime
     *
     * @throws InvalidCommonDateTimeException
     */
    public function __construct(DateTime $dateTime = null) {
        $dateTime = $dateTime ?? "now";

        try {
            $this->value = $dateTime;
        } catch (Exception $e) {
            throw new InvalidCommonDateTimeException($dateTime);
        }
    }

    /**
     * Returns the value.
     *
     * @return DateTime
     */
    public function value(): DateTime {
        return $this->value;
    }
}
