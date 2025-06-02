<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('view-kategori_acara', function (User $user) {
            if ($user->role === "admin" || $user->role === "user") {
                return true;
            }
            return false;
        });
    
        Gate::define('store-kategori_acara', function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });
    
        Gate::define('edit-kategori_acara', function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });
    
        Gate::define('destroy-kategori_acara', function (User $user) {
            if ($user->role === "admin") {
                return true;
            }
            return false;
        });

        Gate::define('view-klien', function (User $user) {
            return in_array($user->role, ['admin', 'user']);
        });
    
        Gate::define('store-klien', function (User $user) {
            return $user->role === "admin";
        });
    
        Gate::define('edit-klien', function (User $user) {
            return $user->role === "admin";
        });
    
        Gate::define('destroy-klien', function (User $user) {
            return $user->role === "admin";
        });

        Gate::define('view-acara', function (User $user) {
            return in_array($user->role, ['admin', 'user']);
        });
    
        Gate::define('store-acara', function (User $user) {
            return $user->role === "admin";
        });
    
        Gate::define('edit-acara', function (User $user) {
            return $user->role === "admin";
        });
    
        Gate::define('destroy-acara', function (User $user) {
            return $user->role === "admin";
        });

                // Vendor
        Gate::define('view-vendor', function (User $user) {
            return in_array($user->role, ['admin', 'user']);
        });

        Gate::define('store-vendor', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('edit-vendor', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('destroy-vendor', function (User $user) {
            return $user->role === 'admin';
        });

        // Jadwal Acara
        Gate::define('view-jadwal_acara', function (User $user) {
            return in_array($user->role, ['admin', 'user']);
        });

        Gate::define('store-jadwal_acara', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('edit-jadwal_acara', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('destroy-jadwal_acara', function (User $user) {
            return $user->role === 'admin';
        });
    }
}

