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
 * Class PurposeTypeEnum
 * @package OptimoApps\RazorPayX\Enum
 */
enum PurposeTypeEnum: string
{
    /**
     * refund
     */
    case REFUND = 'refund';
    /**
     * cashback
     */
    case CASH_BACK = 'cashback';
    /**
     *  payout
     */
    case PAYOUT = 'payout';
    /**
     *  salary
     */
    case SALARY = 'salary';
    /**
     * Utility Bill
     */
    case UTILITY_BILL = 'utility bill';
    /**
     *  Vendor Bill
     */
    case VENDOR_BILL = 'vendor bill';
}
