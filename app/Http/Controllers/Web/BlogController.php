<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use App\Models\Review;

class BlogController extends Controller
{
    public function find($id)
    {
        $blog = Blog::with("blogCategories", "blogTags")->find($id);
        return view(
            'web.blog-details',
            [
                "blog" => $blog,
                "categories" => BlogCategory::withCount("blogs")->take(5)->get(),
                "blogs" => Blog::take(3)->get(),
                "tags" => BlogTag::withCount("blogs")->take(5)->get(),
            ]
        );
    }
    public function index()
    {
        $blogs = Blog::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
        })->when(request()->tag_id, function ($q) {
            $q->whereRelation("blogTags", "blog_tags.id", request()->tag_id);
        })->when(request()->category_id, function ($q) {
            $q->whereRelation("blogCategories", "blog_categories.id", request()->category_id);
        });
        if ($blogs->count() > 0) {
            return view("web.blog", [
                "blogs" => $blogs->paginate(request()->page_size),
                "reviews"=>Review::get(),
                "recent_blogs"=>Blog::take(2)->get(),
         
            ]);
        }
        return redirect()->back();
    }
}
