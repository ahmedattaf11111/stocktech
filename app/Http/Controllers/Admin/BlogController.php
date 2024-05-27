<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create blog")->only(["store"]);
        $this->middleware("permission:super admin|update blog")->only("update");
        $this->middleware("permission:super admin|view blog")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete blog")->only("destroy");
    }
    public function index()
    {
        $items = Blog::with("blogCategories","blogTags")->latest()->paginate(request()->page_size);
        return view('admin.blog', [
            "items" => $items,
            "categories" => BlogCategory::get(),
            "tags" => BlogTag::get(),
        ]);
    }

    public function indexData()
    {
        return Blog::with("blogCategories","blogTags")->when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'name_ar' => "required",
            'author_name' => "required",
            'content' => "required",
            'content_ar' => "required",
            'author_note' => "required",
            'author_about' => "required",
            'image' => "required",
            'first_image' => "required",
            'second_image' => "required",
            'author_image' => "required",
            "categories_ids" => "required",
            "tags_ids" => "required",

            "section_one_title" => "required",
            "section_one_content" => "required",
            "section_tow_title" => "required",
            "section_tow_content" => "required",

            "section_three_title" => "required",
            "section_three_content" => "required",
            "section_three_point_one" => "required",
            "section_three_point_tow" => "required",
            "section_three_point_three" => "required",

            "section_four_title" => "required",
            "section_four_content" => "required",
            "section_four_point_one" => "required",
            "section_four_point_tow" => "required",
            "section_four_point_three" => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $image = $request->file("image")->store("");
        $first_image = $request->file("first_image")->store("");
        $second_image = $request->file("second_image")->store("");
        $author_image = $request->file("author_image")->store("");
        $input = $v->validated();
        $input["image"] = $image;
        $input["first_image"] = $first_image;
        $input["second_image"] = $second_image;
        $input["author_image"] = $author_image;
        $blog = Blog::create($input);
        $blog->blogCategories()->sync(request()->categories_ids);
        $blog->blogTags()->sync(request()->tags_ids);
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'name_ar' => "required",
            'author_name' => "required",
            'author_note' => "required",
            'author_about' => "required",
            'content' => "required",
            'content_ar' => "required",
            'image' => "nullable",
            'first_image' => "nullable",
            'second_image' => "nullable",
            'author_image' => "nullable",
            "categories_ids" => "required",
            "tags_ids" => "required",

            "section_one_title" => "required",
            "section_one_content" => "required",
            "section_tow_title" => "required",
            "section_tow_content" => "required",

            "section_three_title" => "required",
            "section_three_content" => "required",
            "section_three_point_one" => "required",
            "section_three_point_tow" => "required",
            "section_three_point_three" => "required",

            "section_four_title" => "required",
            "section_four_content" => "required",
            "section_four_point_one" => "required",
            "section_four_point_tow" => "required",
            "section_four_point_three" => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();
        if ($request->file("image")) {
            $input["image"] = $request->file("image")->store("");
        }

        if ($request->file("author_image")) {
            $input["author_image"] = $request->file("author_image")->store("");
        }
        if ($request->file("first_image")) {
            $input["first_image"] = $request->file("first_image")->store("");
        }
        if ($request->file("second_image")) {
            $input["second_image"] = $request->file("second_image")->store("");
        }
        $item = Blog::find($id);
        if ($request->file("image")) {
            Storage::delete($item->image);
        }
        if ($request->file("first_image")) {
            Storage::delete($item->first_image);
        }
        if ($request->file("second_image")) {
            Storage::delete($item->second_image);
        }
        if ($request->file("author_image")) {
            Storage::delete($item->author_image);
        }
        $item->update($input);
        $item->blogCategories()->sync(request()->categories_ids);
        $item->blogTags()->sync(request()->tags_ids);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Blog::find($id);
            Storage::delete($team->image);
            Storage::delete($team->author_image);
            $team->delete();
        }
    }
}
