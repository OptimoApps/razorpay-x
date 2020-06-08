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


use Mockery;
use OptimoApps\RazorPayX\Entity\Account;
use OptimoApps\RazorPayX\Entity\Bank;
use OptimoApps\RazorPayX\Enum\AccountTypeEnum;
use OptimoApps\RazorPayX\RazorPayX;
use OptimoApps\RazorPayX\Tests\TestCase;

class AccountTest extends TestCase
{

    private RazorPayX $razorPayX;

    public function setUp(): void
    {
        parent::setUp();
        $this->razorPayX = app()->make(RazorPayX::class);   //Mockery::mock(RazorPayX::class);
    }

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

    public function testCanFetchAccount(): void
    {
        $account = new Account();
        $account->account_type = AccountTypeEnum::BANK_ACCOUNT;
        $response = $this->razorPayX->account()->fetch($account);
        $this->assertIsObject($response);
        $this->assertIsArray($response->items);
        $this->assertInstanceOf(Account::class, $response->items[0]);
        $this->assertEquals(1, $response->count);
    }

    public function testCanFindAccount(): void
    {
        $response = $this->razorPayX->account()->find('fa_EzFCyMGCEwTgmS');
        $this->assertIsObject($response);
        $this->assertInstanceOf(Bank::class, $response->bank_account);
        $this->assertEquals('HDFC0000053', $response->bank_account->ifsc);
    }

}
