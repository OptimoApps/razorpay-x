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

namespace Optimoapps\RazorPayX\Entity;

/**
 * Class Transaction.
 */
class Transaction
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var string
     */
    public string $entity;

    /**
     * @var string
     */
    public string $account_number;

    /**
     * @var int
     */
    public int $amount;

    /**
     * @var string
     */
    public string $currency;

    /**
     * @var int
     */
    public int $credit;

    /**
     * @var int
     */
    public int $debit;

    /**
     * @var int
     */
    public int $balance;

    /**
     * @var Source
     */
    public $source;

    /**
     * @var int
     */
    public int $created_at;

    /**
     * @var int
     */
    public int $from;

    /**
     * @var int
     */
    public int $to;

    /**
     * @var int
     */
    public int $count;

    /**
     * @var int
     */
    public int $skip;

    /**
     * Convert Object to Array.
     */
    public function toArray(): array
    {
        return array_filter((array) get_object_vars($this), static function ($val) {
            return ! is_null($val);
        });
    }
}
