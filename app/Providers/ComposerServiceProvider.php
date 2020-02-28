<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facedes\View;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer('frontend.element.footer', 'App\Http\ViewComposers\FooterComposer');
        view()->composer('frontend.element.brand', 'App\Http\ViewComposers\BrandComposer');
        view()->composer('frontend.element.header', 'App\Http\ViewComposers\HeaderComposer');
    }

    public function register()
    {
        //
    }
}
