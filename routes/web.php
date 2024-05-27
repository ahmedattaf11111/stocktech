<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("set-locale/{locale}", function ($locale) {
    Session::put("lang", $locale);
    return Redirect::back();
});

Route::prefix("admin")->namespace("Admin")->name("admin.")->group(function () {
    Route::prefix("teams")->name("team.")->middleware("auth")
        ->group(function () {
            Route::get("", "TeamController@index");
            Route::post("multi-delete", "TeamController@destroy");
            Route::get("data", "TeamController@indexData")->name('data');
            Route::post("", "TeamController@store");
            Route::post("{id}", "TeamController@update");
        });
    Route::prefix("reviews")->name("review.")->middleware("auth")
        ->group(function () {
            Route::get("", "ReviewContorller@index");
            Route::post("multi-delete", "ReviewContorller@destroy");
            Route::get("data", "ReviewContorller@indexData")->name('data');
            Route::post("", "ReviewContorller@store");
            Route::post("{id}", "ReviewContorller@update");
        });
    Route::prefix("partners")->name("partner.")->middleware("auth")
        ->group(function () {
            Route::get("", "PartnerController@index");
            Route::post("multi-delete", "PartnerController@destroy");
            Route::get("data", "PartnerController@indexData")->name('data');
            Route::post("", "PartnerController@store");
            Route::post("{id}", "PartnerController@update");
        });
    Route::prefix("services")->name("service.")->middleware("auth")
        ->group(function () {
            Route::get("", "ServiceController@index");
            Route::post("multi-delete", "ServiceController@destroy");
            Route::get("data", "ServiceController@indexData")->name('data');
            Route::post("", "ServiceController@store");
            Route::post("{id}", "ServiceController@update");
            Route::delete("delete-image/{id}/{image}", "ServiceController@deleteImage");
        });
    Route::prefix("contact")->name("contact.")->middleware("auth")
        ->group(function () {
            Route::get("", "ContactController@index");
            Route::post("multi-delete", "ContactController@destroy");
            Route::get("data", "ContactController@indexData")->name('data');
        });

    Route::prefix("users")->name("user.")->middleware("auth")
        ->group(function () {
            Route::get("", "UserController@index");
            Route::post("multi-delete", "UserController@destroy");
            Route::get("data", "UserController@indexData")->name('data');
            Route::post("toggle-status/{id}", "UserController@toggleStatus")->name('data');
        });

    Route::prefix("career-applications")->name("career.")->middleware("auth")
        ->group(function () {
            Route::get("", "CareerApplicationController@index");
            Route::post("multi-delete", "CareerApplicationController@destroy");
            Route::get("data", "CareerApplicationController@indexData")->name('data');
        });

    Route::prefix("faqs")->name("faq.")->middleware("auth")
        ->group(function () {
            Route::get("", "FaqController@index");
            Route::post("multi-delete", "FaqController@destroy");
            Route::get("data", "FaqController@indexData")->name('data');
            Route::post("", "FaqController@store");
            Route::post("{id}", "FaqController@update");
            Route::delete("delete-image/{id}/{image}", "FaqController@deleteImage");
        });
    Route::prefix("blog-categories")->name("blog-category.")->middleware("auth")
        ->group(function () {
            Route::get("", "BlogCategoryController@index");
            Route::post("multi-delete", "BlogCategoryController@destroy");
            Route::get("data", "BlogCategoryController@indexData")->name('data');
            Route::post("", "BlogCategoryController@store");
            Route::post("{id}", "BlogCategoryController@update");
        });


    Route::prefix("employees")->name("employee.")->middleware("auth")
        ->group(function () {
            Route::get("", "EmployeeController@index");
            Route::get("role-data", "EmployeeController@indexDataRoles");
            Route::post("store-role", "EmployeeController@storeRole");
            Route::post("update-role/{id}", "EmployeeController@updateRole");
            Route::delete("destroy-role/{id}", "EmployeeController@destroyRole");

            Route::get("data", "EmployeeController@indexData");
            Route::get("all-roles", "EmployeeController@getAllRoles");
            Route::post("", "EmployeeController@store");
            Route::post("multi-delete", "EmployeeController@destroy");
            Route::post("{id}", "EmployeeController@update");
            Route::post("toggle-status/{id}", "EmployeeController@toggleStatus");
        });

    Route::prefix("career-team")->name("career-team.")->middleware("auth")
        ->group(function () {
            Route::get("", "CareerTeamController@index");
            Route::post("multi-delete", "CareerTeamController@destroy");
            Route::get("data", "CareerTeamController@indexData")->name('data');
            Route::post("", "CareerTeamController@store");
            Route::post("{id}", "CareerTeamController@update");
        });

    Route::prefix("career-types")->name("career-type.")->middleware("auth")
        ->group(function () {
            Route::get("", "CareerTypeController@index");
            Route::post("multi-delete", "CareerTypeController@destroy");
            Route::get("data", "CareerTypeController@indexData")->name('data');
            Route::post("", "CareerTypeController@store");
            Route::post("{id}", "CareerTypeController@update");
        });

    Route::prefix("careers")->name("career.")->middleware("auth")
        ->group(function () {
            Route::get("", "CareerController@index");
            Route::post("multi-delete", "CareerController@destroy");
            Route::get("data", "CareerController@indexData")->name('data');
            Route::post("", "CareerController@store");
            Route::post("{id}", "CareerController@update");
        });

    Route::prefix("project-categories")->name("project-category.")->middleware("auth")
        ->group(function () {
            Route::get("", "ProjectCategoryController@index");
            Route::post("multi-delete", "ProjectCategoryController@destroy");
            Route::get("data", "ProjectCategoryController@indexData")->name('data');
            Route::post("", "ProjectCategoryController@store");
            Route::post("{id}", "ProjectCategoryController@update");
        });
    Route::prefix("projects")->name("project-category.")->middleware("auth")
        ->group(function () {
            Route::get("", "ProjectController@index");
            Route::post("multi-delete", "ProjectController@destroy");
            Route::get("data", "ProjectController@indexData")->name('data');
            Route::post("", "ProjectController@store");
            Route::post("{id}", "ProjectController@update");
            Route::delete("delete-image/{id}/{image}", "ProjectController@deleteImage");
        });
    Route::prefix("blog-tags")->name("blog-tag.")->middleware("auth")
        ->group(function () {
            Route::get("", "BlogTagController@index");
            Route::post("multi-delete", "BlogTagController@destroy");
            Route::get("data", "BlogTagController@indexData")->name('data');
            Route::post("", "BlogTagController@store");
            Route::post("{id}", "BlogTagController@update");
        });
    Route::prefix("blogs")->name("blog.")->middleware("auth")
        ->group(function () {
            Route::get("", "BlogController@index");
            Route::post("multi-delete", "BlogController@destroy");
            Route::get("data", "BlogController@indexData")->name('data');
            Route::post("", "BlogController@store");
            Route::post("{id}", "BlogController@update");
        });

    Route::prefix("about")->name("about.")->middleware("auth")->group(function () {
        Route::get("", "AboutController@show");
        Route::post("", "AboutController@save");
        Route::delete("delete-image/{image}", "AboutController@deleteImage");
    });

    Route::prefix("home")->name("home.")->middleware("auth")->group(function () {
        Route::get("", "HomeController@show");
        Route::post("", "HomeController@save");
    });

    Route::prefix("web-setting")->name("web-setting.")->middleware("auth")->group(function () {
        Route::get("", "WebSettingController@show");
        Route::post("", "WebSettingController@save");
    });

    Route::get("login", "AuthController@login")->name("login")->middleware("guest");
    Route::post("login", "AuthController@postLogin");
    Route::get("logout", "AuthController@logout")->name('logout')->middleware("auth");
    Route::prefix("admin-settings")->name("admin-setting.")->middleware("auth")->group(function () {
        Route::post("", "AdminSettingController@save");
        Route::get("", "AdminSettingController@show");
    });
});

Route::prefix("web")->namespace("Web")->name("web.")->group(function () {
    Route::get("home", "HomeController@index")->name("home");
    Route::get("about", "AboutController@index")->name("about");
    Route::get("teams", "TeamController@index")->name("team");
    Route::get("careers", "CareerController@index")->name("career");
    Route::post("careers/apply", "CareerController@apply")->name("apply");
    Route::get("career-details/{id}", "CareerController@find")->name("career-details");
    Route::get("team-details/{id}", "TeamController@find")->name("team");
    Route::get("blog-details/{id}", "BlogController@find")->name("team");
    Route::get("blogs", "BlogController@index")->name("blog");
    Route::get("services", "ServiceController@index")->name("service");
    Route::get("faqs", "FaqController@index")->name("faq");
    Route::post("create-contact", "ContactController@store")->name("create-contact");
    Route::get("contact", "ContactController@index")->name("contact");
    Route::get("service-details/{id}", "ServiceController@find")->name("team");
    Route::get("project-details/{id}", "ProjectController@find")->name("project");
    Route::get("projects", "ProjectController@index")->name("projects");
    Route::post("register", "AuthController@register")->name("register");
    Route::post("login", "AuthController@login")->name("login");
    Route::get("logout", "AuthController@logout")->name("logout");
});
