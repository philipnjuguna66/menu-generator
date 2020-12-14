<?php


namespace PhilipNjuguna\MenuGenerator;

use Illuminate\Support\ServiceProvider;

class MenuGeneratorServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->app->singleton('Menu', function ($app) {
            return Menu::build();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
