<?php

namespace SYSOTEL\APP\Common\Services\ImageServices;

use Illuminate\Support\ServiceProvider;

class ImageServicesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ImageStorageManager', function () {
            return new ImageStorageManager(
                $this->driver()
            );
        });
    }

    /**
     * @return string
     */
    protected function driver(): string
    {
        return config('filesystems.property_public');
    }
}
