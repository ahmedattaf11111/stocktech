<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    
    public function __construct()
    {
        $this->middleware("permission:super admin|create faq")->only(["store"]);
        $this->middleware("permission:super admin|update faq")->only("update");
        $this->middleware("permission:super admin|view faq")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete faq")->only("destroy");
    }
    
    public function index()
    {
        $items = Faq::latest()->paginate(request()->page_size);
        return view('admin.faq', ["items" => $items]);
    }

    public function indexData()
    {
        return Faq::when(request()->text, function ($q) {
            $q->where("question", "like", "%" . request()->tSext . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'question' => "required",
            'answer' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        Faq::create($v->validated());
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'question' => "required",
            'answer' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $item = Faq::find($id);
        $item->update($v->validated());
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Faq::find($id);
            $team->delete();
        }
    }
}
