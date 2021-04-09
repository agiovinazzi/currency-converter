<?php

namespace App\Console\Commands;

use App\Repositories\Exceptions\RepositoryException;
use App\Services\CustomerTransactionService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class getCurrencyByCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all currency for a given customer';
    /**
     * @var CustomerTransactionService
     */
    private $customerTransactionService;

    /**
     * Create a new command instance.
     *
     * @param CustomerTransactionService $customerTransactionService
     */
    public function __construct(CustomerTransactionService $customerTransactionService)
    {
        parent::__construct();
        $this->customerTransactionService = $customerTransactionService;
    }

    /**
     * Execute the console command.
     *
     * @throws RepositoryException
     */
    public function handle()
    {
        // get all the transactions by a given customer id
        $result = $this->customerTransactionService->getTransactionsByCustomerId($this->argument('id'));

        // print the results in the console, based on the number of transactions found
        count($result) > 0 ? $this->table(['date', 'amount'], $result) :
            $this->error('No transactions found for customer '.$this->argument('id'));
    }
}
