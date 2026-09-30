<?php

namespace App\Providers;

use App\Models\CompanySetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('website.*', function ($view) {
            static $company = null;

            if ($company === null) {
                try {
                    $company = CompanySetting::pluck('value', 'key')->toArray();
                } catch (\Throwable $e) {
                    $company = [];
                }
            }

            $view->with('company', $company);
        });
    }
}
