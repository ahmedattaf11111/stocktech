<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogTagController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create blog-tag")->only(["store"]);
        $this->middleware("permission:super admin|update blog-tag")->only("update");
        $this->middleware("permission:super admin|view blog-tag")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete blog-tag")->only("destroy");
    }
    public function index()
    {
        $items = BlogTag::latest()->paginate(request()->page_size);
        return view('admin.blog-tag', ["items" => $items]);
    }

    public function indexData()
    {
        return BlogTag::when(request()->text, function ($q) {
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
        $tag = BlogTag::create($v->validated());
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "BlogTag", "model_id" => $tag->id]
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
        $item = BlogTag::find($id);
        $item->update($v->validated());
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "BlogTag", "model_id" => $item->id]
        ]);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = BlogTag::find($id);
            $team->delete();
        }
    }
}
