<?php

namespace Xa\BoostrapUI;

use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class BootstrapUIServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(BootsrapUI $extension)
    {
        if (!BootsrapUI::boot()) {
            return;
        }

        $vendor_path = 'vendor/laravel-admin-ext/bootsrap-ui/';

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path($vendor_path)],
                'laravel-admin-bootsrap-ui'
            );
        }

        Admin::booting(function () use ($vendor_path) {
            $skin = str_replace('skin', 'skin-xa', config('admin.skin'));

            array_push(
                Admin::$baseCss,
                $vendor_path . 'Bootsrap/dist/css/bootstrap.min.css'

            );
            array_push(
                Admin::$baseJs,
                $vendor_path . 'Bootsrap/dist/js/bootstrap.bundle.min.js'
            );

            //  Admin::script('$.bootsrap.init()');
        });
    }
}
