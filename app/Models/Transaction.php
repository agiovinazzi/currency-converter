<?php

namespace App\Models;

class Transaction
{
    private $customerId;
    private $date;
    private $value;

    public function __construct(int $customerId, string $date, string $value)
    {
        $this->customerId = $customerId;
        $this->date = $date;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }


    public function getCurrency(): string
    {
        return substr($this->value, 0, 3);
    }

    public function getAmount(): float
    {
        return (float) substr($this->value, 3);
    }
}
