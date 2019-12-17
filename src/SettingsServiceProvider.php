<?php

namespace MuetzeOfficial\Settings;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class SettingsServiceProvider extends ServiceProvider
{
    protected $settings;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'migrations');

            $this->commands([
                \MuetzeOfficial\Settings\Console\SettingSetCommand::class,
            ]);
        }

        // Register migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('setting', \MuetzeOfficial\Settings\Setting::class);
        $this->registerBladeExtensions();
    }

    /**
     * Register Blade Directives
     */
    public function registerBladeExtensions()
    {
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            $bladeCompiler->directive('setting', function ($key) {
                return "<?php echo setting({$key}); ?>";
            });
        });
    }
}
