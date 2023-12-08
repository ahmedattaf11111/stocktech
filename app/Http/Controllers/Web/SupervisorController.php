<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Supervisor;

class SupervisorController extends Controller
{
    public function __construct()
    {
    }

    public function getSupervisors()
    {
        if (request()->limit) {
            return Supervisor::with("mediaManager")->where("status", 1)->take(request()->limit)->get();
        }
    }
}
