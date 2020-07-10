<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */
declare(strict_types=1);

namespace OptimoApps\RazorPayX\Contracts;

use OptimoApps\RazorPayX\Entity\Transaction;
use OptimoApps\RazorPayX\Entity\TransactionCollection;
use OptimoApps\RazorPayX\Exceptions\RazorPayException;
use OptimoApps\RazorPayX\Http;

/**
 * Class TransactionManager.
 */
class TransactionManager extends Http
{
    public const ENDPOINT = '/transactions';

    /**Fetch all Transactions
     * @link https://razorpay.com/docs/razorpayx/api/transactions/#fetch-all-transactions
     * @param Transaction $transaction
     * @return TransactionCollection
     * @throws RazorPayException
     */
    public function fetch(Transaction $transaction): TransactionCollection
    {
        $response = $this->get(self::ENDPOINT, $transaction->toArray())->getContents();
        $transactionCollection = new TransactionCollection();
        $this->jsonMapper->mapObject(json_decode($response), $transactionCollection);

        return $transactionCollection;
    }

    /**
     * Fetch Transaction by ID.
     *
     * @see https://razorpay.com/docs/razorpayx/api/transactions/#fetch-transaction-by-id
     *
     * @param string $transactionId
     * @return Transaction
     * @throws RazorPayException
     */
    public function find(string $transactionId): Transaction
    {
        $response = $this->get(self::ENDPOINT, $transactionId)->getContents();
        $transaction = new Transaction();
        $this->jsonMapper->mapObject(json_decode($response), $transaction);

        return $transaction;
    }
}
