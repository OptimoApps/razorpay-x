<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace OptimoApps\RazorPayX\Tests\Integration;

use OptimoApps\RazorPayX\Exceptions\InvalidConfigException;
use OptimoApps\RazorPayX\Tests\TestCase;
use RazorPayX;

class ConfigExceptionTest extends TestCase
{
    /*
      * @test
      */
    public function testCanThrowExceptionConfigNotSet(): void
    {
        $this->app['config']->set('razorpay-x.key_id', '');
        $this->expectException(InvalidConfigException::class);
        RazorPayX::contact()->find('test');
    }
}
