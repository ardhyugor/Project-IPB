<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filament\Pages\ArsipPersonalSearch;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-arsip', function ($user) {
            // Define your logic to determine if the user can view arsip
            return in_array($user->role, ['admin', 'staff']); // Example roles
        });
    }

    
}
