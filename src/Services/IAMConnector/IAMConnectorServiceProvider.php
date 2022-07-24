<?php

namespace SYSOTEL\APP\Common\Services\IAMConnector;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class IAMConnectorServiceProvider extends PackageServiceProvider
{
    /**
     * @param Package $package
     */
    public function configurePackage(Package $package): void
    {
        $package->name('sys-iam-php-connector')->hasConfigFile('sys-iam-connector');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function bootingPackage()
    {
        $this->publishes([
            __DIR__.'/../config/sys-iam-connector.php' => config_path('sys-iam-connector.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function registeringPackage()
    {
        $this->app->singleton('sys-connector.iam', function ($app) {
            return new IAM(config('sys-iam-connector'));
        });
    }
}
