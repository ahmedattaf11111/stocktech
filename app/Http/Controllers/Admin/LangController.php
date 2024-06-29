<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LangController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create lang")->only(["store"]);
        $this->middleware("permission:super admin|update lang")->only("update");
        $this->middleware("permission:super admin|view lang")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete lang")->only("destroy");
    }

    public function index()
    {
        $items = Lang::latest()->paginate(request()->page_size);
        return view('admin.lang', ["items" => $items]);
    }

    public function indexData()
    {
        return Lang::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'is_rtl' => "required",
            'key' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        Lang::create($v->validated());
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'is_rtl' => "required",
            'key' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $item = Lang::find($id);
        $item->update($v->validated());
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Lang::find($id);
            $team->delete();
        }
    }
}
