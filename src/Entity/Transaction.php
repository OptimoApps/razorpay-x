<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */
declare(strict_types=1);

namespace Optimoapps\RazorPayX\Entity;

/**
 * Class Transaction.
 */
class Transaction
{
    public string $id;

    public string $entity;

    public string $account_number;

    public int $amount;

    public string $currency;

    public int $credit;

    public int $debit;

    public int $balance;

    /**
     * @var Source
     */
    public $source;

    public int $created_at;

    public int $from;

    public int $to;

    public int $count;

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
