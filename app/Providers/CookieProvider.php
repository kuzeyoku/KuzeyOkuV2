<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CookieProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (config("information.cookie_notification_status", \App\Enums\StatusEnum::Passive->value) == \App\Enums\StatusEnum::Active->value) {
            $page = \App\Models\Page::find(config("information.cookie_policy_page"));
            view()->composer("common.cookie_alert", function ($view) use ($page) {
                $cookiePolicyPageLink = $page->url ?? null;
                $view->with(compact("cookiePolicyPageLink"));
            });
        }
    }
}
