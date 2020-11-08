<?php

namespace App\Providers;

use App\Http\Resources\EventResource;
use Illuminate\Support\ServiceProvider;

/**
* @OA\Info(
*      version="1.0.0",
*      title="ARGON - EVENTS - API SPECIFICATIONS",
*      description="An API documentation used for Argon Events App",
* )
*
*  @OA\Server(
*      url="https://argon.test/api/v1/",
*      description="Local Server"
*  )
*
*  @OA\Server(
*      url="http://vtuberland.commude.biz/api/v1/",
*      description="Dev Server"
*  )
*/

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
        EventResource::withoutWrapping();
    }
}
