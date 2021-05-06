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
use JsonMapper\LaravelPackage\ServiceProvider;
use OptimoApps\RazorPayX\RazorPayX;
use OptimoApps\RazorPayX\RazorPayXServiceProvider;
use OptimoApps\RazorPayX\Tests\TestCase;

/**
 * Class ServiceProviderTest.
 */
class ServiceProviderTest extends TestCase
{
    /*
     * @test
     */
    public function testBootPublishesConfig(): void
    {
        $app = new Application();
        $serviceProvider = new RazorPayXServiceProvider($app);

        $serviceProvider->boot();

        self::assertArrayHasKey(RazorPayXServiceProvider::class, $serviceProvider::$publishes);
        self::assertIsArray($serviceProvider::$publishes[RazorPayXServiceProvider::class]);
        self::assertCount(2, $serviceProvider::$publishes[RazorPayXServiceProvider::class]);
    }

    /*
     * @test
     */
    public function testRegisterMakesRazorXAvailableInApp(): void
    {
        $app = new Application();
        $app->offsetSet('config', new Repository());
        (new RazorPayXServiceProvider($app))->register();
        (new ServiceProvider($app))->register();


        self::assertTrue($app->has(RazorPayX::class));
        self::assertInstanceOf(RazorPayX::class, $app->make(RazorPayX::class));
    }
}
