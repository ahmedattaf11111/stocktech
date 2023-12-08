<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\EmployeePlatform;

class PlatformEmployeeController extends Controller
{
    public function __construct()
    {
    }

    public function getEmployees()
    {
        if (request()->limit) {
            return EmployeePlatform::with("mediaManager")->where("status", 1)->take(request()->limit)->get();
        }
    }
}
