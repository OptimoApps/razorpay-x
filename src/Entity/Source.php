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

namespace Optimoapps\RazorPayX\Entity;


/**
 * Class Source
 * @package Optimoapps\RazorPayX\Entity
 */
class Source
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
    public string $payer_name;

    /**
     * @var string
     */
    public string $payer_account;

    /**
     * @var string
     */
    public string $payer_ifsc;

    /**
     * @var string
     */
    public string $mode;

    /**
     * @var string
     */
    public string $bank_reference;

    /**
     * @var int
     */
    public int $amount;

    /**
     * Convert Object to Array
     * @return array
     */
    public function toArray(): array
    {
        return array_filter((array)get_object_vars($this), static function ($val) {
            return !is_null($val);
        });
    }
}
