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

namespace OptimoApps\RazorPayX\Tests\Unit;

use OptimoApps\RazorPayX\Entity\Payment;
use OptimoApps\RazorPayX\Enum\PaymentModeEnum;
use OptimoApps\RazorPayX\RazorPayX;
use OptimoApps\RazorPayX\Tests\TestCase;

class PaymentTest extends TestCase
{
    private RazorPayX $razorPayX;

    public function setUp(): void
    {
        parent::setUp();
        $this->razorPayX = app()->make(RazorPayX::class);
    }

    /*
     * @test
     */
    public function testCanCreatePayment(): void
    {
        $payment = new Payment();
        $payment->account_number = '2323230002025787';
        $payment->fund_account_id = 'fa_EzFCyMGCEwTgmS';
        $payment->amount = 102;
        $payment->currency = 'INR';
        $payment->mode = PaymentModeEnum::IMPS;
        $payment->purpose = 'payout';
        $response = $this->razorPayX->payment()->create($payment);
        $this->assertEquals('INR', $response->currency);
    }

    /*
     * @test
     */
    public function testCanFetchPayment(): void
    {
        $payment = new Payment();
        $payment->account_number = '2323230002025787';
        $response = $this->razorPayX->payment()->fetch($payment);
        $this->assertInstanceOf(Payment::class, $response->items[0]);
        $this->assertIsArray($response->items);
    }

    /*
     * @test
     */
    public function testCanFindPayment()
    {
        $response = $this->razorPayX->payment()->find('pout_Ezim1yeEp7oGif');
        $this->assertEquals('INR', $response->currency);
    }
}
