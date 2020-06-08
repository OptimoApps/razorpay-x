<?php

namespace OptimoApps\RazorPayX;

use Illuminate\Support\ServiceProvider;
use OptimoApps\RazorPayX\Contracts\AccountManager;
use OptimoApps\RazorPayX\Contracts\ContactManager;
use OptimoApps\RazorPayX\Contracts\PaymentManager;
use OptimoApps\RazorPayX\Contracts\TransactionManager;

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
        $this->app->singleton(RazorPayX::class, static function () {
            return new RazorpayX(new ContactManager(), new AccountManager(), new PaymentManager(),new TransactionManager());
        });
        $this->app->alias(RazorPayX::class, 'razorpay-x');
    }
}
