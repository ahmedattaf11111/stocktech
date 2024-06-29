<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ReviewContorller extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create review")->only(["store"]);
        $this->middleware("permission:super admin|update review")->only("update");
        $this->middleware("permission:super admin|view review")->only(["index", "indexData"]);
        $this->middleware("permission:super admin|delete review")->only("destroy");
    }

    public function index()
    {
        $items = Review::latest()->paginate(request()->page_size);
        return view('admin.review', ["items" => $items]);
    }

    public function indexData()
    {
        return Review::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%")
                ->orWhere("job", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'review' => "required",
            'image' => "required",
            'job' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $image = $request->file("image")->store("");
        $input = $v->validated();
        $input["image"] = $image;
        $review = Review::create($input);
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "Review", "model_id" => $review->id],
            ['key' => "review", "value" => request()->review, "class" => "Review", "model_id" => $review->id],
            ['key' => "job", "value" => request()->job, "class" => "Review", "model_id" => $review->id],
        ]);
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'review' => "required",
            'image' => "nullable",
            'job' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();
        if ($request->file("image")) {
            $input["image"] = $request->file("image")->store("");
        }
        $item = Review::find($id);
        if ($request->file("image")) {
            Storage::delete($item->image);
        }
        $item->update($input);
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "Review", "model_id" => $item->id],
            ['key' => "review", "value" => request()->review, "class" => "Review", "model_id" => $item->id],
            ['key' => "job", "value" => request()->job, "class" => "Review", "model_id" => $item->id],
        ]);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Review::find($id);
            Storage::delete($team->image);
            $team->delete();
        }
    }
}
