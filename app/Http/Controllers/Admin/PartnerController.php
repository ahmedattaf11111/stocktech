<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create partner")->only(["store"]);
        $this->middleware("permission:super admin|update partner")->only("update");
        $this->middleware("permission:super admin|view partner")->only(["index","indexData"]);
        $this->middleware("permission:super admin|delete partner")->only("destroy");
        
    }

    public function index()
    {
        $items = Partner::latest()->paginate(request()->page_size);
        return view('admin.partner', ["items" => $items]);
    }

    public function indexData()
    {
        return Partner::latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'image' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $image = $request->file("image")->store("");
        $input = $v->validated();
        $input["image"] = $image;
        Partner::create($input);
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'image' => "nullable",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();
        if ($request->file("image")) {
            $input["image"] = $request->file("image")->store("");
        }
        $item = Partner::find($id);
        if ($request->file("image")) {
            Storage::delete($item->image);
        }
        $item->update($input);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Partner::find($id);
            Storage::delete($team->image);
            $team->delete();
        }
    }
}
