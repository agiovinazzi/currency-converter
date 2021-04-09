<?php

namespace Tests\Unit\Services;

use App\Services\CurrencyConverterService;
use Tests\TestCase;

class CurrencyConvertServiceTest extends TestCase
{

    public function testRateWithEuroCurrency()
    {
        $service = new CurrencyConverterService();

        $result = $service->convertAmount('EUR', "5.00");
        $this->assertEquals('EUR5.00', $result);
    }

    public function testRateWithDollarCurrency()
    {
        $service = new CurrencyConverterService();

        $result = $service->convertAmount('USD', "5.00");
        $this->assertEquals('EUR4.50', $result);
    }
}
