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
 * Class Vpa.
 */
class Vpa
{
    public string $address;

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
