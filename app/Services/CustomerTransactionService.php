<?php


namespace App\Services;


use App\Repositories\CurrencyRepository;
use App\Repositories\Exceptions\RepositoryException;

class CustomerTransactionService
{
    private $currencyRepository;
    private $currencyConverterService;

    public function __construct
    (
        CurrencyRepository $currencyRepository,
        CurrencyConverterService $currencyConverterService
    )
    {
        $this->currencyRepository = $currencyRepository;
        $this->currencyConverterService = $currencyConverterService;
    }

    /**
     * @param $customerId
     * @return array
     * @throws RepositoryException
     */
    public function getTransactionsByCustomerId($customerId): array
    {
        // get all the transaction entities for the given customer id
        $transactions = $this->currencyRepository->getTransactionsByCustomerId($customerId);

        // create an array with the transactions date and the amount converted
        return array_map(function ($item) {
            return [$item->getDate(), $this->currencyConverterService->convertAmount($item->getCurrency(), $item->getAmount())];
        }, $transactions);
    }
}
