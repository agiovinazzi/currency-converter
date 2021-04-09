<?php


namespace App\Services;


use App\Repositories\Exceptions\RepositoryException;

class CurrencyConverterService
{
    private $currencyMap = [
        'GBP' => 1.17,
        'USD' => 0.90,
        'EUR' => 1.00
    ];

    public function convertAmount(string $currency, float $amount): string
    {
        // check if the currency is handled by the system
        try {
            $rate = $this->currencyMap[$currency];
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage());
        }

        // returns the amount converted in EUR
        return 'EUR'.(number_format($amount * $rate, 2));
    }
}
