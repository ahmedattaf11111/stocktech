<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Review;
use App\Models\Service;
use App\Models\Team;

class AboutController extends Controller
{
    public function index()
    {
        return view("web.about", [
            "about" => About::first(),
            "services" => Service::take(2)->get(),
            "reviews" => Review::get(),
            "teams" => Team::take(5)->get(),
            "partners" => Partner::take(6)->get(),
            "blogs" => Blog::with("blogCategories")->take(2)->get(),
        ]);
    }
}
