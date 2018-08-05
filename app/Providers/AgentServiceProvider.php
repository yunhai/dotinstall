<?php

namespace App\Providers;

use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AgentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $agent = new Agent();

        Blade::if('is_sp', function () use ($agent) {
            return $agent->isMobile();
        });

        Blade::if('is_pc', function () use ($agent) {
            return $agent->isDesktop();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
