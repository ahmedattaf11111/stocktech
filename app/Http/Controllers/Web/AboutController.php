<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About;

class AboutController extends Controller
{
    public function __construct()
    {
    }

    public function getAbout()
    {
        return About::with("mediaManager")->first();
    }
}
