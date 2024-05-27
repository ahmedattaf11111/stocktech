<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Service;

class ServiceController extends Controller
{
    public function find($id)
    {
        $service = Service::find($id);
        return view(
            'web.service-details',
            [
                "service" => $service,
                "reviews" => Review::get(),
                "services" => Service::take(3)->get(),
                "faqs" => Faq::take(3)->get(),
            ]
        );
    }
    public function index()
    {
        return view("web.service", [
            "services" => Service::paginate(request()->page_size),
            "reviews"=>Review::get(),
            "blogs"=>Blog::take(2)->get(),
        ]);
    }
}
