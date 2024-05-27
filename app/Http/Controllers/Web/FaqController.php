<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Service;

class FaqController extends Controller
{
    public function index()
    {
        return view("web.faqs", [
            "faqs" => Faq::take(4)->get(),
            "reviews" => Review::get(),
            "blogs" => Blog::take(2)->get(),
        ]);
    }
}
