<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware("permission:super admin|create project")->only(["store"]);
        $this->middleware("permission:super admin|update project")->only("update");
        $this->middleware("permission:super admin|view project")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete project")->only("destroy");
    }

    public function index()
    {
        $items = Project::latest()->paginate(request()->page_size);
        $categories = ProjectCategory::get();
        return view('admin.project', ["items" => $items, "categories" => $categories]);
    }

    public function indexData()
    {
        return Project::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'client' => "required",
            'designer' => "required",
            'description' => "required",
            'category_id' => "required",
            'images' => "required",
            'section_one_title' => "required",
            'section_one_content' => "required",
            'section_tow_title' => "required",
            'section_tow_content' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }

        $input = $v->validated();
        $images = [];
        foreach (request()->file("images") as $file) {
            $images[] = $file->store("");
        }
        $input["images"] = $images;
        Project::create($input);
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'client' => "required",
            'description' => "required",
            'designer' => "required",
            'category_id' => "required",
            'images' => "nullable",
            'section_one_title' => "required",
            'section_one_content' => "required",
            'section_tow_title' => "required",
            'section_tow_content' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();

        $item = Project::find($id);
        if (request()->file("images")) {
            foreach ($item->images as $image) {
                Storage::delete($image);
            }
            $images = [];
            foreach (request()->file("images") as $file) {
                $images[] = $file->store("");
            }
            $input["images"] = $images;
        }
        $item->update($input);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Project::find($id);
            Storage::delete($team->image);
            $team->delete();
        }
    }
    public function deleteImage($id, $image)
    {
        $item = Project::find($id);
        $item->images = collect($item->images)->filter(function ($_image) use ($image) {
            return $image != $_image;
        })->values()->toArray();
        Storage::delete($image);
        $item->save();
        return $item->images;
    }
}
