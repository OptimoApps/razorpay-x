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


use OptimoApps\RazorPayX\Entity\Contact;
use OptimoApps\RazorPayX\Entity\ContactCollection;
use OptimoApps\RazorPayX\Http;

/**
 * Class ContactManager
 * @package OptimoApps\RazorPayX\Contracts
 */
class ContactManager extends Http
{
    /**
     *
     */
    protected const ENDPOINT = '/contacts';

    /**
     * Create a Contact
     * @link https://razorpay.com/docs/razorpayx/api/contacts/#create-a-contact
     * @param Contact $contact
     * @return Contact
     */
    public function create(Contact $contact): Contact
    {
        $response = $this->post(self::ENDPOINT, $contact->toArray())->getContents();
        $contactResponse = new Contact();
        $this->jsonMapper->mapObject(json_decode($response), $contactResponse);
        return $contactResponse;
    }

    /**
     * Update a Contact
     * @link https://razorpay.com/docs/razorpayx/api/contacts/#update-a-contact
     * @param string $id
     * @param Contact $contact
     * @return Contact
     */
    public function update(string $id, Contact $contact): Contact
    {
        $response = $this->patch(self::ENDPOINT . '/' . $id, $contact->toArray())->getContents();
        $contactResponse = new Contact();
        $this->jsonMapper->mapObject(json_decode($response), $contactResponse);
        return $contactResponse;
    }

    /**
     * Activate or Deactivate a Contact
     * @link https://razorpay.com/docs/razorpayx/api/contacts/#activate-or-deactivate-a-contact
     * @param string $id
     * @param bool $active
     * @return Contact
     */
    public function changeStatus(string $id, bool $active): Contact
    {
        $response = $this->patch(self::ENDPOINT . '/' . $id, ['active' => $active])->getContents();
        $contactResponse = new Contact();
        $this->jsonMapper->mapObject(json_decode($response), $contactResponse);
        return $contactResponse;
    }

    /**
     * Fetch a Contact by ID
     * @link https://razorpay.com/docs/razorpayx/api/contacts/#fetch-a-contact-by-id
     * @param string $contactId
     * @return Contact
     */
    public function find(string $contactId): Contact
    {
        $response = $this->get(self::ENDPOINT . '/' . $contactId)->getContents();
        $contactResponse = new Contact();
        $this->jsonMapper->mapObject(json_decode($response), $contactResponse);
        return $contactResponse;
    }

    /**
     * Fetch All Contacts
     * @link https://razorpay.com/docs/razorpayx/api/contacts/#fetch-all-contacts
     * @param Contact|null $contact
     * @return ContactCollection
     */
    public function fetch(Contact $contact = null): ContactCollection
    {
        $contactParam = is_null($contact) ? [] : $contact->toArray();
        $response = $this->get(self::ENDPOINT, $contactParam)->getContents();
        $contactResponse = new ContactCollection();
        $this->jsonMapper->mapObject(json_decode($response), $contactResponse);
        return $contactResponse;
    }
}
