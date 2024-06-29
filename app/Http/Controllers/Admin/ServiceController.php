<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create service")->only(["store"]);
        $this->middleware("permission:super admin|update service")->only("update");
        $this->middleware("permission:super admin|view service")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete service")->only("destroy");
    }

    public function index()
    {
        $items = Service::latest()->paginate(request()->page_size);
        return view('admin.service', ["items" => $items]);
    }

    public function indexData()
    {
        return Service::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'images' => "required",
            "detail_content" => "required",
            "detail_point_one" => "required",
            "detail_point_tow" => "required",
            "detail_point_three" => "required",
            "detail_point_four" => "required",
            "detail_point_five" => "required",
            "detail_point_six" => "required",
            'description' => "required",
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
        $service = Service::create($input);
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "Service", "model_id" => $service->id],
            ['key' => "detail_content", "value" => request()->detail_content, "class" => "Service", "model_id" => $service->id],
            ['key' => "detail_point_one", "value" => request()->detail_point_one, "class" => "Service", "model_id" => $service->id],
            ['key' => "detail_point_tow", "value" => request()->detail_point_tow, "class" => "Service", "model_id" => $service->id],
            ['key' => "detail_point_three", "value" => request()->detail_point_three, "class" => "Service", "model_id" => $service->id],
            ['key' => "detail_point_four", "value" => request()->detail_point_four, "class" => "Service", "model_id" => $service->id],
            ['key' => "detail_point_five", "value" => request()->detail_point_five, "class" => "Service", "model_id" => $service->id],
            ['key' => "detail_point_six", "value" => request()->detail_point_six, "class" => "Service", "model_id" => $service->id],
            ['key' => "description", "value" => request()->description, "class" => "Service", "model_id" => $service->id],
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'images' => "nullable",
            "detail_content" => "required",
            "detail_point_one" => "required",
            "detail_point_tow" => "required",
            "detail_point_three" => "required",
            "detail_point_four" => "required",
            "detail_point_five" => "required",
            "detail_point_six" => "required",
            'description' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();

        $item = Service::find($id);
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
            ['key' => "name", "value" => request()->name, "class" => "Service", "model_id" => $item->id],
            ['key' => "detail_content", "value" => request()->detail_content, "class" => "Service", "model_id" => $item->id],
            ['key' => "detail_point_one", "value" => request()->detail_point_one, "class" => "Service", "model_id" => $item->id],
            ['key' => "detail_point_tow", "value" => request()->detail_point_tow, "class" => "Service", "model_id" => $item->id],
            ['key' => "detail_point_three", "value" => request()->detail_point_three, "class" => "Service", "model_id" => $item->id],
            ['key' => "detail_point_four", "value" => request()->detail_point_four, "class" => "Service", "model_id" => $item->id],
            ['key' => "detail_point_five", "value" => request()->detail_point_five, "class" => "Service", "model_id" => $item->id],
            ['key' => "detail_point_six", "value" => request()->detail_point_six, "class" => "Service", "model_id" => $item->id],
            ['key' => "description", "value" => request()->description, "class" => "Service", "model_id" => $item->id],
        ]);

    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Service::find($id);
            Storage::delete($team->image);
            $team->delete();
        }
    }
    public function deleteImage($id, $image)
    {
        $item = Service::find($id);
        $item->images = collect($item->images)->filter(function ($_image) use ($image) {
            return $image != $_image;
        })->values()->toArray();
        Storage::delete($image);
        $item->save();
        return $item->images;
    }
}
