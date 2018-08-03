<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use App\Providers\SocialiteLineProvider;
use App\Providers\SocialiteYahooJpProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->bootSocialiteLine();
        $this->bootSocialiteYahooJp();

        Blade::if('diamond_user', function () {
            if (Auth::check()) {
                return (Auth::user()->grade == USER_GRADE_DIAMOND);
            }
            return false;
        });

        Blade::if('normal_user', function () {
            if (Auth::check()) {
                return (Auth::user()->grade == USER_GRADE_NORMAL);
            }
            return false;
        });

        Blade::if('is_sp', function () {
            $check_agent = ['iPhone', 'Android'];
            $p = '/'.implode('|', $check_agent). '/i';
            dd(preg_match($p, $_SERVER['HTTP_USER_AGENT']));
            return preg_match($p, $_SERVER['HTTP_USER_AGENT']);
        });
    }

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

    private function bootSocialiteYahooJp()
    {
        $socialite = $this->app->make('Laravel\Socialite\Contracts\Factory');
        $socialite->extend(
            'yahoo',
            function ($app) use ($socialite) {
                $config = $app['config']['services.yahoojp'];
                return $socialite->buildProvider(SocialiteYahooJpProvider::class, $config);
            }
        );
    }
}
