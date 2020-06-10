<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

declare(strict_types=1);

namespace OptimoApps\RazorPayX;

use Illuminate\Support\Facades\Facade;

/**
 * @see \OptimoApps\RazorPayX\RazorPayX
 */
class RazorPayXFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'razorpay-x';
    }
}
