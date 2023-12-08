<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store(SettingRequest $request)
    {
        $setting = Setting::first();
        if (!$setting) {
            Setting::create($request->validated());
        } else {
            $setting->update($request->validated());
        }
    }
    public function getAbout()
    {
        return Setting::first();
    }
}
