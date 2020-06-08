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

namespace OptimoApps\RazorPayX\Contracts;


use OptimoApps\RazorPayX\Entity\Transaction;
use OptimoApps\RazorPayX\Entity\TransactionCollection;
use OptimoApps\RazorPayX\Http;

/**
 * Class TransactionManager
 * @package Optimoapps\RazorPayX\Contracts
 */
class TransactionManager extends Http
{
    /**
     *
     */
    public const ENDPOINT = '/transactions';

    /**Fetch all Transactions
     * @link https://razorpay.com/docs/razorpayx/api/transactions/#fetch-all-transactions
     * @param Transaction $transaction
     * @return TransactionCollection
     */
    public function fetch(Transaction $transaction): TransactionCollection
    {
        $response = $this->get(self::ENDPOINT, $transaction->toArray())->getContents();
        $transactionCollection = new TransactionCollection();
        $this->jsonMapper->mapObject(json_decode($response), $transactionCollection);
        return $transactionCollection;
    }

    /**
     * Fetch Transaction by ID
     * @link https://razorpay.com/docs/razorpayx/api/transactions/#fetch-transaction-by-id
     * @param string $transactionId
     * @return Transaction
     */
    public function find(string $transactionId): Transaction
    {
        $response = $this->get(self::ENDPOINT, $transactionId)->getContents();
        $transaction = new Transaction();
        $this->jsonMapper->mapObject(json_decode($response), $transaction);
        return $transaction;
    }
}
