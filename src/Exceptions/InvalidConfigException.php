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

namespace OptimoApps\RazorPayX\Exceptions;

/**
 * Class InvalidConfigException
 * @package OptimoApps\RazorPayX\Exceptions
 */
class InvalidConfigException extends \Exception
{
    /**
     * @return InvalidConfigException
     */
    public static function keyNotSpecified(): InvalidConfigException
    {
        return new static('There was a missing key in config file');
    }
}
