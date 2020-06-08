<?php
/**
 * *
 *  *  * Copyright (C) OPTIMO TECHNOLOGIES  - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <sathish.thi@gmail.com>ManiKandan<smanikandanit@gmail.com >.
 */

namespace OptimoApps\RazorPayX\Tests;

use OptimoApps\RazorPayX\RazorPayXFacade;
use OptimoApps\RazorPayX\RazorPayXServiceProvider;

/**
 * Class TestCase.
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array|string[]
     */
    public function getPackageProviders($app): array
    {
        return [
            RazorPayXServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array|string[]
     */
    protected function getPackageAliases($app): array
    {
        return [
            'RazorPayX' => RazorPayXFacade::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('razorpay-x.key_id', env('KEY_ID'));

        $app['config']->set('razorpay-x.KEY_SECRET', env('KEY_SECRET'));
    }
}
