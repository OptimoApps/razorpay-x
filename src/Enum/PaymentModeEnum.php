<?php
/*
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >
 *  *
 *
 */

namespace OptimoApps\RazorPayX\Enum;

/**
 * Class PaymentModeEnum.
 */
enum PaymentModeEnum: string
{
    /**
     *  NEFT.
     */
   case NEFT = 'NEFT';
    /**
     * RTGS.
     */
    case RTGS = 'RTGS';
    /**
     * IMPS.
     */
    case IMPS = 'IMPS';
    /**
     * UPI.
     */
    case UPI = 'UPI';
}
