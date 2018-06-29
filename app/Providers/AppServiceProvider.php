<?php

namespace App\Providers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

        // $this->app->resolving(Controller::class, function () {
        //     // dd(view()->shared);
        //     // View::share('js', ['pandog']);
        //     dd(request()->route()->getActionName());
        //     // $controller->setHtmlViewRenderer(app(HtmlViewRenderer::class));
        // });
    }
}
