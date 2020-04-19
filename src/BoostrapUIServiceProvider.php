<?php

namespace Xa\BoostrapUI;

use Encore\Admin\Admin;
use Illuminate\Support\ServiceProvider;

class BootstrapUIServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(BoostrapUI $extension)
    {
        if (!BoostrapUI::boot()) {
            return;
        }

        $vendor_path = 'vendor/laravel-admin-ext/boostrap-ui/';

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path($vendor_path)],
                'laravel-admin-boostrap-ui'
            );
        }

        Admin::booting(function () use ($vendor_path) {
            $skin = str_replace('skin', 'skin-xa', config('admin.skin'));

            array_push(
                Admin::$baseCss,
                $vendor_path . 'Boostrap/dist/css/bootstrap.min.css'

            );
            array_push(
                Admin::$baseJs,
                $vendor_path . 'Boostrap/dist/js/bootstrap.bundle.min.js'
            );

            //  Admin::script('$.boostrap.init()');
        });
    }
}
