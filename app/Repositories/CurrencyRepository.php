<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\Exceptions\RepositoryException;

class CurrencyRepository
{
    public function getTransactionsByCustomerId(int $customerId): array
    {
        $result = [];

        try {
            // retrieve all data
            $file = fopen(database_path() . '/data.csv', 'r');

            // loop all the data rows to create the Transaction entities
            if (($handle = $file) !== false) {
                while (($data = fgetcsv($handle, 1000, ";")) !== false) {
                    // skip csv header row with fields names
                    if (!is_numeric($data[0])) {
                        continue;
                    }

                    // entity creation
                    $transaction = new Transaction($data[0], $data[1], $data[2]);

                    // add the transaction entity to the result array only if the customer id is equals to the one given
                    // from he artisan command
                    if ($transaction->getCustomerId() === $customerId) {
                        array_push($result, $transaction);
                    }

                }
                fclose($handle);
            }
        } catch (\Exception $e) {
            throw new RepositoryException($e->getMessage());
        }

        return $result;
    }
}
