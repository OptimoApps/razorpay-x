<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */
declare(strict_types=1);

namespace OptimoApps\RazorPayX\Entity;

/**
 * Class Payment.
 */
class Payment
{
    public string $account_number;

    public string $fund_account_id;

    public int $amount;

    public string $currency;

    public string $mode;

    public string $purpose;

    public bool $queue_if_low_balance;

    public ?string $reference_id;

    public string $narration;

    public array $notes;

    public string $id;

    public string $entity;

    public ?int $fees;

    public int $tax;

    public string $status;

    public ?string $utr;

    public ?string $batch_id;

    public ?string $failure_reason;

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
