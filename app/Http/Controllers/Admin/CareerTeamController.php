<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerTeamController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create career-team")->only(["store"]);
        $this->middleware("permission:super admin|update career-team")->only("update");
        $this->middleware("permission:super admin|view career-team")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete career-team")->only("destroy");
    }

    public function index()
    {
        $items = CareerTeam::latest()->paginate(request()->page_size);
        return view('admin.career-team', ["items" => $items]);
    }

    public function indexData()
    {
        return CareerTeam::when(request()->text, function ($q) {
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
        CareerTeam::create($v->validated());
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
        $item = CareerTeam::find($id);
        $item->update($v->validated());
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = CareerTeam::find($id);
            $team->delete();
        }
    }
}
