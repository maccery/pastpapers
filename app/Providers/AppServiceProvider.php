<?php

namespace App\Providers;

use App\Vote;
use App\Observers\VoteObserver;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') == 'production')
        {
            $this->app['request']->server->set('HTTPS', true);
        }
        Vote::observe(VoteObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
