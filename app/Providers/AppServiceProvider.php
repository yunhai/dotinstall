<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use App\Providers\SocialiteLineProvider;

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
        $this->bootSocialiteLine();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::directive('media_path', function (string $path) {
            return '<?php echo "' . Storage::disk('media')->url($path) . '"; ?>';
        });
    }

    private function bootSocialiteLine()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'line',
            function ($app) use ($socialite) {
                $config = $app['config']['services.line'];
                return $socialite->buildProvider(SocialiteLineProvider::class, $config);
            }
        );
    }
}
