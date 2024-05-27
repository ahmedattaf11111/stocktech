<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|create team")->only(["store"]);
        $this->middleware("permission:super admin|update team")->only("update");
        $this->middleware("permission:super admin|view team")->only(["index","indexData"]);
        $this->middleware("permission:super admin|delete team")->only("destroy");

    }

    public function index()
    {
        $items = Team::latest()->paginate(request()->page_size);
        return view('admin.team', ["items" => $items]);
    }

    public function indexData()
    {
        return Team::when(request()->text, function ($q) {
            $q->where("name", "like", "%" . request()->text . "%")
                ->orWhere("job", "like", "%" . request()->text . "%");
        })->latest()->paginate(request()->page_size);
    }

    public function store(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'job' => "required",
            'first_link' => "required",
            'second_link' => "required",
            'third_link' => "required",
            'about' => "required",
            'skill_content' => "required",
            'experience_content' => "required",
            "skill_one" => "required",
            "skill_one_rate" => "required",
            "skill_tow" => "required",
            "skill_tow_rate" => "required",
            "skill_three" => "required",
            "skill_three_rate" => "required",
            "experience_one" => "required",
            "experience_one_duration" => "required",
            "experience_tow" => "required",
            "experience_tow_duration" => "required",
            "experience_three" => "required",
            "experience_three_duration" => "required",
            "experience_four" => "required",
            "experience_four_duration" => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $image = $request->file("image")->store("");
        $input = $v->validated();
        $input["image"] = $image;
        Team::create($input);
    }
    public function update(Request $request, $id)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'name' => "required",
            'job' => "required",
            'first_link' => "required",
            'second_link' => "required",
            'third_link' => "required",
            'about' => "required",
            'skill_content' => "required",
            'experience_content' => "required",
            "skill_one" => "required",
            "skill_one_rate" => "required",
            "skill_tow" => "required",
            "skill_tow_rate" => "required",
            "skill_three" => "required",
            "skill_three_rate" => "required",
            "experience_one" => "required",
            "experience_one_duration" => "required",
            "experience_tow" => "required",
            "experience_tow_duration" => "required",
            "experience_three" => "required",
            "experience_three_duration" => "required",
            "experience_four" => "required",
            "experience_four_duration" => "required",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $input = $v->validated();
        if ($request->file("image")) {
            $input["image"] = $request->file("image")->store("");
        }
        $item = Team::find($id);
        if ($request->file("image")) {
            Storage::delete($item->image);
        }
        $item->update($input);
    }

    public function destroy()
    {
        foreach (request()->ids as $id) {
            $team = Team::find($id);
            Storage::delete($team->image);
            $team->delete();
        }
    }
}
