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

namespace OptimoApps\RazorPayX\Enum;


/**
 * Class PurposeTypeEnum
 * @package OptimoApps\RazorPayX\Enum
 */
final class PurposeTypeEnum
{
    /**
     * refund
     */
    public const REFUND = 'refund';
    /**
     * cashback
     */
    public const CASH_BACK = 'cashback';
    /**
     *  payout
     */
    public const PAYOUT = 'payout';
    /**
     *  salary
     */
    public const SALARY = 'salary';
    /**
     * Utility Bill
     */
    public const UTILITY_BILL = 'utility bill';
    /**
     *  Vendor Bill
     */
    public const VENDOR_BILL = 'vendor bill';
}
