<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use View;

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
        //
        Paginator::useBootstrap();
        View::composer('*', function($view)
        {
            $media = Media::orderBy('created_at', 'desc')->get();
            $view->with('media', $media);

            // Get User
            $loggedInUser = Auth::user();
            $view->with('loggedInUser', $loggedInUser);
        });
    }
}
