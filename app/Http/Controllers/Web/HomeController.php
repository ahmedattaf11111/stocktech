<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Home;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        return view("web.home", [
            "home" => Home::first(),
            "about" => About::first(),
            "teams" => Team::take(3)->get(),
            "blogs" => Blog::take(2)->get(),
            "services" => Service::take(10)->get(),
            "reviews" => Review::get(),
            "partners" => Partner::get(),
            "projects" => Project::with("category")->take(3)->get(),
        ]);
    }
}
