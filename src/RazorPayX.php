<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace OptimoApps\RazorPayX;

use Optimoapps\RazorPayX\Contracts\AccountManager;
use OptimoApps\RazorPayX\Contracts\ContactManager;
use OptimoApps\RazorPayX\Contracts\PaymentManager;
use Optimoapps\RazorPayX\Contracts\TransactionManager;

/**
 * Class RazorPayX.
 */
class RazorPayX
{
    protected ContactManager $contactManager;

    protected AccountManager $accountManager;

    protected PaymentManager $paymentManager;

    protected TransactionManager $transactionManager;

    /**
     * RazorPayX constructor.
     */
    public function __construct(ContactManager $contactManager,
                                AccountManager $accountManager,
                                PaymentManager $paymentManager,
                                TransactionManager $transactionManager)
    {
        $this->contactManager = $contactManager;
        $this->accountManager = $accountManager;
        $this->paymentManager = $paymentManager;
        $this->transactionManager = $transactionManager;
    }

    public function contact(): ContactManager
    {
        return $this->contactManager;
    }

    public function account(): AccountManager
    {
        return $this->accountManager;
    }

    public function payment(): PaymentManager
    {
        return $this->paymentManager;
    }

    public function transaction(): TransactionManager
    {
        return $this->transactionManager;
    }
}
