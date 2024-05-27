<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware("permission:super admin|create career-type")->only(["store"]);
        $this->middleware("permission:super admin|update career-type")->only("update");
        $this->middleware("permission:super admin|view career-type")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete career-type")->only("destroy");
    }

    public function index()
    {
        $items = CareerType::latest()->paginate(request()->page_size);
        return view('admin.career-type', ["items" => $items]);
    }

    public function indexData()
    {
        return CareerType::when(request()->text, function ($q) {
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
        CareerType::create($v->validated());
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
        $item = CareerType::find($id);
        $item->update($v->validated());
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = CareerType::find($id);
            $team->delete();
        }
    }
}
