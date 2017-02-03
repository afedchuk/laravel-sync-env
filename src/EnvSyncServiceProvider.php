<?php
/**
 * @link http://fuel.rocketroute.com/
 * @copyright (c) 2017 RocketRoute Ltd
 */

namespace RocketRoute\EnvUpdater;

use Illuminate\Support\ServiceProvider;

/**
 * EnvSyncServiceProvider
 *
 * @author Andrii Fedchuk <andriy.fedchuk@rocketroute.com>
 */
class EnvSyncServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(CommandLaravel::class);
    }
}
