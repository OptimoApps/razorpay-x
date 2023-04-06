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
 * Class AccountTypeEnum.
 */
enum  AccountTypeEnum: string
{
   case BANK_ACCOUNT = 'bank_account';

   case VPA = 'vpa';

    case CARD = 'card';
}
