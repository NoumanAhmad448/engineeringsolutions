<?php

namespace App\Providers;

use App\Models\ConfigSetting;
use App\Models\Social;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Course;
use App\Observers\CourseObserver;
use App\Observers\UserObserver;
use App\Models\Category;
use App\Observers\CategoryObserver;
use App\Models\CourseDetail;
use App\Observers\CourseDetailObserver;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (trim(config('app.env')) == config("setting.roles.dev")) {
            $this->app['request']->server->set('HTTP', true);
            resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme(config("setting.http"));
            URL::forceScheme(config("setting.http"));
        }
        $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
        $this->app->register(TelescopeServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Category::observe(CategoryObserver::class);
        Course::observe(CourseObserver::class);
        CourseDetail::observe(CourseDetailObserver::class);




        try {
            DB::connection()->getPdo();  // Try to connect to the database
            if (Schema::hasTable('socials')) {
                $social = Social::first();
                if ($social) {
                    $social->setSocialMedia();
                }
            }

            if (Schema::hasTable('config_settings')) {
                $settings = ConfigSetting::all();
                if ($settings) {
                    foreach ($settings as $setting) {
                        config(["setting." . $setting->key => false]);
                    }
                }
            }
            if (trim(config('app.env')) == config("setting.roles.dev")) {
                URL::forceScheme(config("setting.http"));
                resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme(config("setting.http"));
            }
        } catch (\Exception $e) {
            Log::error('Database connection failed: ' . $e->getMessage());
        }
    }
}
