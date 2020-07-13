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
declare(strict_types=1);

namespace OptimoApps\RazorPayX;

use Illuminate\Support\ServiceProvider;
use OptimoApps\RazorPayX\Contracts\AccountManager;
use OptimoApps\RazorPayX\Contracts\ContactManager;
use OptimoApps\RazorPayX\Contracts\PaymentManager;
use OptimoApps\RazorPayX\Contracts\TransactionManager;
use OptimoApps\RazorPayX\Exceptions\InvalidConfigException;

class RazorPayXServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('razorpay-x.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'razorpay-x');

        // Register the main class to use with the facade
        $this->app->singleton(RazorPayX::class, function () {
            $this->checkInvalidConfiguration(config('razorpay-x'));

            return new RazorPayX(
                $this->app->get(ContactManager::class),
                $this->app->get(AccountManager::class),
                $this->app->get(PaymentManager::class),
                $this->app->get(TransactionManager::class)
            );
        });
        $this->app->alias(RazorPayX::class, 'razorpay-x');
    }

    /**
     * @param array|null $config
     * @throws InvalidConfigException
     */
    protected function checkInvalidConfiguration(array $config = null): void
    {
        if (empty($config['key_id']) || empty($config['key_secret'])) {
            throw InvalidConfigException::keyNotSpecified();
        }
    }
}
