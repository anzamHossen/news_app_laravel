<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TopAdvertisement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $top_ad_data = TopAdvertisement::where('id',1)->first();
        view()->share('global_top_ad_data', $top_ad_data);
    }
}
