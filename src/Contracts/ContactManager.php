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

use OptimoApps\RazorPayX\Entity\Contact;
use OptimoApps\RazorPayX\Entity\ContactCollection;
use OptimoApps\RazorPayX\Exceptions\RazorPayException;
use OptimoApps\RazorPayX\Http;

/**
 * Class ContactManager.
 */
class ContactManager extends Http
{
    protected const ENDPOINT = '/contacts';

    /**
     * Create a Contact.
     *
     * @see https://razorpay.com/docs/razorpayx/api/contacts/#create-a-contact
     * @param Contact $contact
     * @return Contact
     * @throws RazorPayException
     */
    public function create(Contact $contact): Contact
    {
        $response = $this->post(self::ENDPOINT, $contact->toArray())->getContents();
        $contactResponse = new Contact();
        $this->jsonMapper->mapObjectFromString($response, $contactResponse);

        return $contactResponse;
    }

    /**
     * Update a Contact.
     *
     * @see https://razorpay.com/docs/razorpayx/api/contacts/#update-a-contact
     * @param string $id
     * @param Contact $contact
     * @return Contact
     * @throws RazorPayException|\GuzzleHttp\Exception\GuzzleException
     */
    public function update(string $id, Contact $contact): Contact
    {
        $response = $this->patch(self::ENDPOINT . '/' . $id, $contact->toArray())->getContents();
        $contactResponse = new Contact();
        $this->jsonMapper->mapObjectFromString($response, $contactResponse);

        return $contactResponse;
    }

    /**
     * Activate or Deactivate a Contact.
     *
     * @see https://razorpay.com/docs/razorpayx/api/contacts/#activate-or-deactivate-a-contact
     * @param string $id
     * @param bool $active
     * @return Contact
     * @throws RazorPayException|\GuzzleHttp\Exception\GuzzleException
     */
    public function changeStatus(string $id, bool $active): Contact
    {
        $response = $this->patch(self::ENDPOINT . '/' . $id, ['active' => $active])->getContents();
        $contactResponse = new Contact();
        $this->jsonMapper->mapObjectFromString($response, $contactResponse);

        return $contactResponse;
    }

    /**
     * Fetch a Contact by ID.
     *
     * @see https://razorpay.com/docs/razorpayx/api/contacts/#fetch-a-contact-by-id
     * @param string $contactId
     * @return Contact
     * @throws RazorPayException|\GuzzleHttp\Exception\GuzzleException
     */
    public function find(string $contactId): Contact
    {
        $response = $this->get(self::ENDPOINT . '/' . $contactId)->getContents();
        $contactResponse = new Contact();
        $this->jsonMapper->mapObjectFromString($response, $contactResponse);

        return $contactResponse;
    }

    /**
     * Fetch All Contacts.
     *
     * @see https://razorpay.com/docs/razorpayx/api/contacts/#fetch-all-contacts
     * @param Contact|null $contact
     * @return ContactCollection
     * @throws RazorPayException|\GuzzleHttp\Exception\GuzzleException
     */
    public function fetch(Contact $contact = null): ContactCollection
    {
        $contactParam = is_null($contact) ? [] : $contact->toArray();
        $response = $this->get(self::ENDPOINT, $contactParam)->getContents();
        $contactResponse = new ContactCollection();
        $this->jsonMapper->mapObjectFromString($response, $contactResponse);

        return $contactResponse;
    }
}
