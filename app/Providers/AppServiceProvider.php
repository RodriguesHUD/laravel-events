<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;

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
        // $event = Event::first();
        // $eventOwner = $event ? User::find($event->user_id) : null;

        // View::share('eventOwner', $eventOwner);
        // View::composer('*', function ($view) {
        //     $view->with('eventOwner', Auth::user());
        // });

        View::composer('*', function ($view) {
            $eventOwner = null;
            $authenticatedUser = Auth::user();
            $view->with('authenticatedUser', $authenticatedUser);
            
        });
    }
}
