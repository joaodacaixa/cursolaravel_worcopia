<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        // constraints globais, por exemplo em uma rota que possua vairavel $id 
        //Route::pattern('id','[0-9]+'); ou
        //Route::pattern('id','[a-zA-Z]+');
        //dessa forma não há necesidade de usar where ao final da rota para 
        //determninar/limitar valor 
    }
}
