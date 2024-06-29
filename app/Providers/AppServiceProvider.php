<?php

namespace App\Providers;

use App\Models\AdminSetting;
use App\Models\Dictionary;
use App\Models\Lang;
use App\Models\Location;
use App\Models\WebSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('helpers', function ($app) {
            return require app_path('Helpers/Helper.php');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer("*", function () {
            $adminSetting = AdminSetting::first();
            view()->share([
                "empty" => $adminSetting ? false : true,
                "admin_setting_id" => $adminSetting ? $adminSetting->id : '',
                "app_name_en" => $adminSetting ? $adminSetting->app_name_en : '',
                "dictionaries" => Dictionary::get(),
                "langs" => Lang::get(),
                "color" => $adminSetting ? $adminSetting->color : '',
                "image" => $adminSetting ? $adminSetting->image : '',
            ]);
        });
        view()->composer("*", function () {
            $webSetting = WebSetting::first();
            $app_name_en = $webSetting ? $webSetting->app_name_en : '';
            view()->share([
                "web_empty" => $webSetting ? false : true,
                "web_app_name" =>  $app_name_en,
                "web_app_name_en" => $app_name_en,
                "web_setting_id" => $webSetting ? $webSetting->id : '',
                "web_address" => $webSetting ? $webSetting->address : '',
                "web_privacy_policy" => $webSetting ? $webSetting->privacy_policy : '',
                "web_term_and_condition" => $webSetting ? $webSetting->term_and_condition : '',
                "web_phone" => $webSetting ? $webSetting->phone : '',
                "web_email" => $webSetting ? $webSetting->email : '',
                "web_locations" => Location::get(),
                "web_contact_title" => $webSetting ? $webSetting->contact_title : '',
                "web_contact_content" => $webSetting ? $webSetting->contact_content : '',
                "web_white_logo" => $webSetting ? $webSetting->white_logo : '',
                "web_black_logo" => $webSetting ? $webSetting->black_logo : '',
                "web_review_image" => $webSetting ? $webSetting->review_image : '',
                "web_facebook" => $webSetting ? $webSetting->facebook : '',
                "web_instgram" => $webSetting ? $webSetting->instgram : '',
                "web_behance" => $webSetting ? $webSetting->behance : '',
                "web_twitter" => $webSetting ? $webSetting->twitter : '',
                "web_linkedin" => $webSetting ? $webSetting->linkedin : '',
                "web_youtube" => $webSetting ? $webSetting->youtube : '',
                "web_whatsapp" => $webSetting ? $webSetting->whatsapp : '',
                "web_snapchat" => $webSetting ? $webSetting->snapchat : '',
                "web_tiktok" => $webSetting ? $webSetting->tiktok : '',
            ]);
        });
    }
}
