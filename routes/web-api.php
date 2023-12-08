<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix("auth")->group(function () {
    Route::post("register", "AuthController@register");
    Route::post("login", "AuthController@login");
    Route::get("verify-token", "AuthController@verifyToken");
    Route::post("verify-email", "AuthController@verifyEmail");
    Route::get("resend-verification-code", "AuthController@resendVerificationCode");
    Route::get("user-verified", "AuthController@userVerified");
    Route::get('forget-password/{user:email}', "AuthController@forgetPassword");
    Route::post('reset-password', "AuthController@resetPassword");
    Route::get("logout", "AuthController@logout");
    Route::get('current-user', "AuthController@getCurrentUser");
    Route::post('update-profile', "AuthController@updateProfile");
});


Route::prefix("chat")->group(function () {
    Route::get("rooms", "ChatController@getRooms");
    Route::get("messages/{roomId}", "ChatController@getMessages");
    Route::post("", "ChatController@newMesage");
});

Route::prefix("contacts")->group(function () {
    Route::post("", "ContactController@store");
});

Route::prefix("web-events")->group(function () {
    Route::get("", "EventController@getEvents");
});

Route::prefix("web-supervisors")->group(function () {
    Route::get("", "SupervisorController@getSupervisors");
});

Route::prefix("web-platform-employees")->group(function () {
    Route::get("", "PlatformEmployeeController@getEmployees");
});

Route::prefix("web-blogs")->group(function () {
    Route::get("", "BlogController@getBlogs");
    Route::get("latest", "BlogController@getLatestBlogs");
    Route::get("{id}", "BlogController@getBlog");
});

Route::prefix("web-about")->group(function () {
    Route::get("", "AboutController@getAbout");
});

Route::prefix("web-setting")->group(function () {
    Route::get("", "SettingController@getSetting");
});

Route::get("send-sms", function () {
    
});
