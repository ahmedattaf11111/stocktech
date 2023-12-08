<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
    }

    public function getSetting()
    {
        return Setting::first();
    }
}
