<?php

namespace Tests\Unit\Services;

use App\Models\Transaction;
use App\Repositories\CurrencyRepository;
use App\Services\CurrencyConverterService;
use App\Services\CustomerTransactionService;
use Tests\TestCase;

class CustomerTransactionServiceTest extends TestCase
{
    private $repositoryMock;
    private $currencyConverterServiceMock;

    public function testTransaction()
    {
        // Get a mock of the repository
        $this->repositoryMock = \Mockery::mock(CurrencyRepository::class);
        $this->repositoryMock->shouldReceive('getTransactionsByCustomerId')
            ->withArgs([1])
            ->andReturn([
                new Transaction(1, '01/04/2015', 'GBP50.00')
            ]);


        // Get a mock of the CurrencyConverterService
        $this->currencyConverterServiceMock = \Mockery::mock(CurrencyConverterService::class);
        $this->currencyConverterServiceMock->shouldReceive('convertAmount')
            ->withArgs(['GBP', 50.00])
            ->andReturn('EUR58.50');

        $customerTransactionService = new CustomerTransactionService($this->repositoryMock, $this->currencyConverterServiceMock);

        $result = $customerTransactionService->getTransactionsByCustomerId(1);

        $this->assertEquals([['01/04/2015', 'EUR58.50']],$result);
    }
}
