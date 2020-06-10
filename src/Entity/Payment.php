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

namespace OptimoApps\RazorPayX\Entity;

/**
 * Class Payment.
 */
class Payment
{
    /**
     * @var string
     */
    public string $account_number;

    /**
     * @var string
     */
    public string $fund_account_id;

    /**
     * @var int
     */
    public int $amount;

    /**
     * @var string
     */
    public string $currency;

    /**
     * @var string
     */
    public string $mode;

    /**
     * @var string
     */
    public string $purpose;

    /**
     * @var bool
     */
    public bool $queue_if_low_balance;

    /**
     * @var string
     */
    public string $reference_id;

    /**
     * @var string
     */
    public string $narration;

    /**
     * @var array
     */
    public array $notes;

    /**
     * @var string
     */
    public string $id;

    /**
     * @var string
     */
    public string $entity;

    /**
     * @var int
     */
    public int $fees;

    /**
     * @var int
     */
    public int $tax;

    /**
     * @var string
     */
    public string $status;

    /**
     * @var string
     */
    public string $utr;

    /**
     * @var string
     */
    public string $batch_id;

    /**
     * @var string
     */
    public string $failure_reason;

    /**
     * @var int
     */
    public int $created_at;

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
