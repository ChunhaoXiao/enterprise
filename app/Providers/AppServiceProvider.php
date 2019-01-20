<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Property;
use App\Repository\Interfaces\ActionRepository;
use App\Repository\ModelAction;
use Blade;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(Schema::hasTable('configs'))
        {
            $configs = \App\Models\Config::pluck('value', 'name');

            if($configs->isNotEmpty())
            {
                config($configs->toArray());
            }
        }
        //component alias
        Blade::component('components.category', 'category');
        Blade::component('components.breadcrumb', 'bread');
        Blade::component('components.indexproductorcase', 'indexhot');
        Blade::component('components.carousel', 'carousel');
        Blade::component('components.list', 'card');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->singleton(ActionRepository::class, ModelAction::class);
    }
}
