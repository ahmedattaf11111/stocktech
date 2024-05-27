<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function index()
    {
        return view("web.career", [
            "careers" => Career::with("careerTeam")->get(),
            "reviews" => Review::get(),
            "blogs" => Blog::take(2)->get(),
        ]);
    }
    public function find($id)
    {
        $career = Career::with(["careerTeam", "careerType", "location"])->find($id);
        return view(
            'web.career-details',
            ["career" => $career, "careers" => Career::latest()->take(2)->get()]
        );
    }
    public function apply(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => "required",
            'email' => "required",
            'phone' => "required",
            'career_id' => "required",
            'cv' => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();
        $input["cv"] = $request->file("cv")->store("");
        CareerApplication::create($input);
    }
}
