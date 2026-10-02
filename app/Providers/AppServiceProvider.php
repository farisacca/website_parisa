<?php

namespace App\Providers;

use App\Models\ProfilSekolah;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        //

        View::composer('*', function ($view) {
            static $profilSekolah = null;

            if ($profilSekolah === null) {
                try {
                    if (Schema::hasTable('profil_sekolah')) {
                        $profilSekolah = ProfilSekolah::first();
                    }
                } catch (\Exception $e) {

                    $profilSekolah = null;
                }
            }

            $view->with('profilSekolah', $profilSekolah);
        });

        
    }
}

