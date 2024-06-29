<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create blog-category")->only(["store"]);
        $this->middleware("permission:super admin|update blog-category")->only("update");
        $this->middleware("permission:super admin|view blog-category")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete blog-category")->only("destroy");
    }
    public function index()
    {
        $items = BlogCategory::latest()->paginate(request()->page_size);
        return view('admin.blog-category', ["items" => $items]);
    }

    public function indexData()
    {
        return BlogCategory::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
            $q->where("name_ar", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $cat = BlogCategory::create($v->validated());
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "BlogCategory", "model_id" => $cat->id]
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $item = BlogCategory::find($id);
        $item->update($v->validated());
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "BlogCategory", "model_id" => $item->id]
        ]);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = BlogCategory::find($id);
            $team->delete();
        }
    }
}
