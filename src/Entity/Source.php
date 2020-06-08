<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace Optimoapps\RazorPayX\Entity;

/**
 * Class Source.
 */
class Source
{
    public string $id;

    public string $entity;

    public string $payer_name;

    public string $payer_account;

    public string $payer_ifsc;

    public string $mode;

    public string $bank_reference;

    public int $amount;

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
