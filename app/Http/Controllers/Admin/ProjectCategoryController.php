<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create project-category")->only(["store"]);
        $this->middleware("permission:super admin|update project-category")->only("update");
        $this->middleware("permission:super admin|view project-category")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete project-category")->only("destroy");
    }
    public function index()
    {
        $items = ProjectCategory::latest()->paginate(request()->page_size);
        return view('admin.project-category', ["items" => $items]);
    }

    public function indexData()
    {
        return ProjectCategory::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
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
        $category = ProjectCategory::create($v->validated());
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "ProjectCategory", "model_id" => $category->id]
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
        $item = ProjectCategory::find($id);
        $item->update($v->validated());
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "ProjectCategory", "model_id" => $item->id]
        ]);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = ProjectCategory::find($id);
            $team->delete();
        }
    }
}
