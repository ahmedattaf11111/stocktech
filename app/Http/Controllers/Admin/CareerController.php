<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerTeam;
use App\Models\CareerType;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create career")->only(["store"]);
        $this->middleware("permission:super admin|update career")->only("update");
        $this->middleware("permission:super admin|view career")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete career")->only("destroy");
    }


    public function index()
    {
        $items = Career::latest()->paginate(request()->page_size);
        $types = CareerType::get();
        $teams = CareerTeam::get();
        $locations = Location::get();
        return view('admin.career', [
            "items" => $items,
            "types" => $types,
            "teams" => $teams,
            "locations" => $locations
        ]);
    }

    public function indexData()
    {
        return Career::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'career_type_id' => "required",
            'career_team_id' => "required",
            'location_id' => "required",
            'requirment' => "required",
            'description' => "required",
            'images' => "required",
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
        $career = Career::create($input);
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "Career", "model_id" => $career->id],
            ['key' => "requirment", "value" => request()->requirment, "class" => "Career", "model_id" => $career->id],
            ['key' => "description", "value" => request()->description, "class" => "Career", "model_id" => $career->id],
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'career_type_id' => "required",
            'career_team_id' => "required",
            'location_id' => "required",
            'requirment' => "required",
            'description' => "required",
            'images' => "nullable",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();

        $item = Career::find($id);
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
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "Career", "model_id" => $item->id],
            ['key' => "requirment", "value" => request()->requirment, "class" => "Career", "model_id" => $item->id],
            ['key' => "description", "value" => request()->description, "class" => "Career", "model_id" => $item->id],
        ]);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $item = Career::find($id);
            foreach ($item->images as $image) {
                Storage::delete($image);
            }
            $item->delete();
        }
    }
    public function deleteImage($id, $image)
    {
        $item = Career::find($id);
        $item->images = collect($item->images)->filter(function ($_image) use ($image) {
            return $image != $_image;
        })->values()->toArray();
        Storage::delete($image);
        $item->save();
        return $item->images;
    }
}
