<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function getBlogs()
    {
        if (request()->limit) {
            return Blog::where("status", 1)->with("mediaManager")->take(request()->limit)->get();
        }
        if (request()->page_size) {
            return Blog::with("mediaManager")
                ->orderBy("id", "desc")->paginate(request()->page_size);
        }
    }
    public function getLatestBlogs()
    {
        return Blog::where("status", 1)->with("mediaManager")->take(request()->limit)->orderBy("id", "desc")->get();
    }
    public function getBlog($id)
    {
        return Blog::with("mediaManager")->find($id);
    }
}
