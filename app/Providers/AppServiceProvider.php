<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
// use illuminate\Support\Facades\Route; para acesar configs de rotas

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production' || env('FORCE_HTTPS')) {
        URL::forceScheme('https');
    }
        // constraints globais, por exemplo em uma rota que possua vairavel $id 
        //Route::pattern('id','[0-9]+'); ou
        //Route::pattern('id','[a-zA-Z]+');
        //dessa forma não há necesidade de usar where ao final da rota para 
        //determninar/limitar valor 
    }
}
