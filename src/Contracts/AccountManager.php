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
declare(strict_types=1);

namespace OptimoApps\RazorPayX\Contracts;

use OptimoApps\RazorPayX\Entity\Account;
use OptimoApps\RazorPayX\Entity\AccountCollection;
use OptimoApps\RazorPayX\Exceptions\RazorPayException;
use OptimoApps\RazorPayX\Http;

/**
 * Class AccountManager.
 */
class AccountManager extends Http
{
    protected const ACCOUNT_ENDPOINT = '/fund_accounts';

    /**
     * Create a Fund Account for a Contact's Bank Account (or)
     * Create a Fund Account for a Contact's VPA (or)
     * Create a Fund Account for a Contact's Card.
     *
     * @see https://razorpay.com/docs/razorpayx/api/fund-accounts/#create-a-fund-account-for-a-contacts-bank
     *
     * @param Account $account
     * @return Account
     * @throws RazorPayException|\GuzzleHttp\Exception\GuzzleException
     */
    public function create(Account $account): Account
    {
        $response = $this->post(self::ACCOUNT_ENDPOINT, $account->toArray())->getContents();
        $account = new Account();
        $this->jsonMapper->mapObjectFromString($response, $account);

        return $account;
    }

    /**
     * Activate or Deactivate a Fund Account.
     *
     * @see https://razorpay.com/docs/razorpayx/api/fund-accounts/#activate-or-deactivate-a-fund-account
     *
     * @param string $accountId
     * @param bool $active
     * @return Account
     * @throws RazorPayException|\GuzzleHttp\Exception\GuzzleException
     */
    public function changeStatus(string $accountId, bool $active): Account
    {
        $response = $this->patch(self::ACCOUNT_ENDPOINT . '/' . $accountId, ['active' => $active])->getContents();
        $account = new Account();
        $this->jsonMapper->mapObjectFromString($response, $account);

        return $account;
    }

    /**
     * Fetch All Fund Accounts.
     *
     * @see https://razorpay.com/docs/razorpayx/api/fund-accounts/#fetch-all-fund-accounts
     *
     * @param Account|null $account
     * @return AccountCollection
     * @throws RazorPayException|\GuzzleHttp\Exception\GuzzleException
     */
    public function fetch(Account $account = null): AccountCollection
    {
        $accountParam = is_null($account) ? [] : $account->toArray();
        $response = $this->get(self::ACCOUNT_ENDPOINT, $accountParam)->getContents();
        $accountCollection = new AccountCollection();
        $this->jsonMapper->mapObjectFromString($response, $accountCollection);

        return $accountCollection;
    }

    /**
     * Fetch Fund Account Details by ID.
     *
     * @see https://razorpay.com/docs/razorpayx/api/fund-accounts/#fetch-fund-account-details-by-id
     *
     * @param string $id
     * @return Account
     * @throws RazorPayException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function find(string $id): Account
    {
        $response = $this->get(self::ACCOUNT_ENDPOINT . '/' . $id)->getContents();
        $account = new Account();
        $this->jsonMapper->mapObjectFromString($response, $account);

        return $account;
    }
}
