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

namespace OptimoApps\RazorPayX\Tests\Unit;

use Illuminate\Contracts\Container\BindingResolutionException;
use OptimoApps\RazorPayX\Entity\Account;
use OptimoApps\RazorPayX\Entity\Bank;
use OptimoApps\RazorPayX\Enum\AccountTypeEnum;
use OptimoApps\RazorPayX\Exceptions\RazorPayException;
use OptimoApps\RazorPayX\RazorPayX;
use OptimoApps\RazorPayX\Tests\TestCase;

/**
 * Class AccountTest.
 */
class AccountTest extends TestCase
{
    /**
     * @var mixed|RazorPayX
     */
    private RazorPayX $razorPayX;

    /**
     * @throws BindingResolutionException
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->razorPayX = app()->make(RazorPayX::class);
    }

    /*
     * @test
     */
    public function testCanCreateBankAccount(): void
    {
        $bankAccount = new Bank();
        $bankAccount->name = 'Gaurav Kumar';
        $bankAccount->account_number = '765432123456789';
        $bankAccount->ifsc = 'HDFC0000053';
        $account = new Account();
        $account->contact_id = 'cont_EyrHb3f1S0axBg';
        $account->account_type = AccountTypeEnum::BANK_ACCOUNT;
        $account->bank_account = $bankAccount;
        $response = $this->razorPayX->account()->create($account);
        $this->assertIsObject($response);
        $this->assertIsString($response->id);
        $this->assertEquals(AccountTypeEnum::BANK_ACCOUNT, $response->account_type);
    }

    /*
     * @test
     */
    public function testCanFetchAccount(): void
    {
        $account = new Account();
        $account->account_type = AccountTypeEnum::BANK_ACCOUNT;
        $response = $this->razorPayX->account()->fetch($account);
        $this->assertIsObject($response);
        $this->assertIsArray($response->items);
        $this->assertInstanceOf(Account::class, $response->items[0]);
    }

    /*
     * @test
     */
    public function testCanFindAccount(): void
    {
        $response = $this->razorPayX->account()->find('fa_EzFCyMGCEwTgmS');
        $this->assertIsObject($response);
        $this->assertInstanceOf(Bank::class, $response->bank_account);
        $this->assertEquals('HDFC0000053', $response->bank_account->ifsc);
    }

    /*
     * @test
     */
    public function testCanThrowExceptionNotAccountFind(): void
    {
        $this->expectException(RazorPayException::class);
        $this->razorPayX->account()->find('fa_EzFCyMGCEwTgmSf');
    }
}
