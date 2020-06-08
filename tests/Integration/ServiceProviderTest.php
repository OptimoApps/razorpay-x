<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace OptimoApps\RazorPayX\Tests\Integration;

use Illuminate\Config\Repository;
use Illuminate\Foundation\Application;
use OptimoApps\RazorPayX\RazorPayX;
use OptimoApps\RazorPayX\RazorPayXServiceProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class ServiceProviderTest.
 */
class ServiceProviderTest extends TestCase
{
    public function testBootPublishesConfig(): void
    {
        $app = new Application();
        $serviceProvider = new RazorPayXServiceProvider($app);

        $serviceProvider->boot();

        self::assertArrayHasKey(RazorPayXServiceProvider::class, $serviceProvider::$publishes);
        self::assertIsArray($serviceProvider::$publishes[RazorPayXServiceProvider::class]);
        self::assertCount(1, $serviceProvider::$publishes[RazorPayXServiceProvider::class]);
    }

    public function testRegisterMakesRazorXAvailableInApp(): void
    {
        $app = new Application();
        $app->offsetSet('config', new Repository());
        $serviceProvider = new RazorPayXServiceProvider($app);

        $serviceProvider->register();

        self::assertTrue($app->has(RazorPayX::class));
        self::assertInstanceOf(RazorPayX::class, $app->make(RazorPayX::class));
    }
}
