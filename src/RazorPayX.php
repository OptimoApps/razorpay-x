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
    /**
     * @var ContactManager
     */
    protected ContactManager $contactManager;

    /**
     * @var AccountManager
     */
    protected AccountManager $accountManager;

    /**
     * @var PaymentManager
     */
    protected PaymentManager $paymentManager;

    /**
     * @var TransactionManager
     */
    protected TransactionManager $transactionManager;

    /**
     * RazorPayX constructor.
     * @param ContactManager $contactManager
     * @param AccountManager $accountManager
     * @param PaymentManager $paymentManager
     * @param TransactionManager $transactionManager
     */
    public function __construct(
        ContactManager $contactManager,
        AccountManager $accountManager,
        PaymentManager $paymentManager,
        TransactionManager $transactionManager
    ) {
        $this->contactManager = $contactManager;
        $this->accountManager = $accountManager;
        $this->paymentManager = $paymentManager;
        $this->transactionManager = $transactionManager;
    }

    /**
     * @return ContactManager
     */
    public function contact(): ContactManager
    {
        return $this->contactManager;
    }

    /**
     * @return AccountManager
     */
    public function account(): AccountManager
    {
        return $this->accountManager;
    }

    /**
     * @return PaymentManager
     */
    public function payment(): PaymentManager
    {
        return $this->paymentManager;
    }

    /**
     * @return TransactionManager
     */
    public function transaction(): TransactionManager
    {
        return $this->transactionManager;
    }
}
