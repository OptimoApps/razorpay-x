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

namespace OptimoApps\RazorPayX\Contracts;


use OptimoApps\RazorPayX\Entity\Payment;
use OptimoApps\RazorPayX\Entity\PaymentCollection;
use OptimoApps\RazorPayX\Http;

/**
 * Class PaymentManager
 * @package OptimoApps\RazorPayX\Contracts
 */
class PaymentManager extends Http
{
    /**
     *
     */
    protected const PAYMENT = '/payouts';

    /**
     * Create a Payout
     * @link https://razorpay.com/docs/razorpayx/api/payouts/#create-a-payout
     * @param Payment $payment
     * @return Payment
     */
    public function create(Payment $payment): Payment
    {
        $response = $this->post(self::PAYMENT, $payment->toArray())->getContents();
        $paymentResponse = new Payment();
        $this->jsonMapper->mapObject(json_decode($response), $paymentResponse);
        return $paymentResponse;
    }

    /**
     * Fetch All Payouts
     * @link https://razorpay.com/docs/razorpayx/api/payouts/#fetch-all-payouts
     * @param Payment $payment
     * @return PaymentCollection
     */
    public function fetch(Payment $payment): PaymentCollection
    {
        $response = $this->get(self::PAYMENT, $payment->toArray())->getContents();
        $paymentResponse = new PaymentCollection();
        $this->jsonMapper->mapObject(json_decode($response), $paymentResponse);
        return $paymentResponse;
    }

    /**
     * Fetch a Payout By Id
     * @link https://razorpay.com/docs/razorpayx/api/payouts/#fetch-a-payout-by-id
     * @param string $id
     * @return Payment
     */
    public function find(string $id): Payment
    {
        $response = $this->get(self::PAYMENT . '/' . $id)->getContents();
        $paymentResponse = new Payment();
        $this->jsonMapper->mapObject(json_decode($response), $paymentResponse);
        return $paymentResponse;
    }

    /**
     * Cancel a Queued Payout
     * @link https://razorpay.com/docs/razorpayx/api/payouts/#cancel-a-queued-payout
     * @param string $id
     * @return Payment
     */
    public function cancel(string $id): Payment
    {
        $response = $this->get(self::PAYMENT . '/' . $id . '/cancel')->getContents();
        $paymentResponse = new Payment();
        $this->jsonMapper->mapObject(json_decode($response), $paymentResponse);
        return $paymentResponse;
    }
}
