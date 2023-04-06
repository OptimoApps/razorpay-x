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

use OptimoApps\RazorPayX\Entity\Contact;
use OptimoApps\RazorPayX\Enum\ContactTypeEnum;
use OptimoApps\RazorPayX\Tests\TestCase;
use RazorPayX;

class ContactTest extends TestCase
{
    private static $contact;

    /*
     * @test
     */
    public function testCanCreateContact(): void
    {
        $contact = $this->contact();
        $response = RazorPayX::contact()->create($contact);
        self::$contact = $response->id;
        $this->assertEquals($contact->type, $response->type);
        $this->assertEquals($contact->notes, $response->notes);
    }

    /*
     * @test
     */
    public function testCanFindContact()
    {
        $contact = $this->contact();
        $response = RazorPayX::contact()->find(self::$contact);
        $this->assertEquals($contact->type, $response->type);
        $this->assertEquals($contact->notes, $response->notes);
    }

    private function contact(): Contact
    {
        $contact = new Contact();
        $contact->name = 'Gaurav Kumar';
        $contact->email = 'gaurav.kumar@example.com';
        $contact->contact = '9123456789';
        $contact->type = ContactTypeEnum::EMPLOYEE->value;
        $contact->reference_id = 'Acme Contact ID 12345';
        $contact->notes = [
            'notes_key_1' => 'Tea, Earl Grey, Hot',
            'notes_key_2' => 'Tea, Earl Grey… decaf.',
        ];

        return $contact;
    }
}
