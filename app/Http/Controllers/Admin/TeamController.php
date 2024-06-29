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
        $this->middleware("permission:super admin|view team")->only(["index", "indexData"]);
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
        $team = Team::create($input);
        
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "Team", "model_id" => $team->id],
            ['key' => "job", "value" => request()->job, "class" => "Team", "model_id" => $team->id],
            ['key' => "first_link", "value" => request()->first_link, "class" => "Team", "model_id" => $team->id],
            ['key' => "second_link", "value" => request()->second_link, "class" => "Team", "model_id" => $team->id],
            ['key' => "third_link", "value" => request()->third_link, "class" => "Team", "model_id" => $team->id],
            ['key' => "about", "value" => request()->about, "class" => "Team", "model_id" => $team->id],
            ['key' => "skill_content", "value" => request()->skill_content, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_content", "value" => request()->experience_content, "class" => "Team", "model_id" => $team->id],
            ['key' => "skill_one", "value" => request()->skill_one, "class" => "Team", "model_id" => $team->id],
            ['key' => "skill_one_rate", "value" => request()->skill_one_rate, "class" => "Team", "model_id" => $team->id],
            ['key' => "skill_tow", "value" => request()->skill_tow, "class" => "Team", "model_id" => $team->id],
            ['key' => "skill_tow_rate", "value" => request()->skill_tow_rate, "class" => "Team", "model_id" => $team->id],
            ['key' => "skill_three", "value" => request()->skill_three, "class" => "Team", "model_id" => $team->id],
            ['key' => "skill_three_rate", "value" => request()->skill_three_rate, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_one", "value" => request()->experience_one, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_one_duration", "value" => request()->experience_one_duration, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_tow", "value" => request()->experience_tow, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_tow_duration", "value" => request()->experience_tow_duration, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_three", "value" => request()->experience_three, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_three_duration", "value" => request()->experience_three_duration, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_four", "value" => request()->experience_four, "class" => "Team", "model_id" => $team->id],
            ['key' => "experience_four_duration", "value" => request()->experience_four_duration, "class" => "Team", "model_id" => $team->id],
        ]);
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
                
        insertDictionary([
            ['key' => "name", "value" => request()->name, "class" => "Team", "model_id" => $item->id],
            ['key' => "job", "value" => request()->job, "class" => "Team", "model_id" => $item->id],
            ['key' => "first_link", "value" => request()->first_link, "class" => "Team", "model_id" => $item->id],
            ['key' => "second_link", "value" => request()->second_link, "class" => "Team", "model_id" => $item->id],
            ['key' => "third_link", "value" => request()->third_link, "class" => "Team", "model_id" => $item->id],
            ['key' => "about", "value" => request()->about, "class" => "Team", "model_id" => $item->id],
            ['key' => "skill_content", "value" => request()->skill_content, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_content", "value" => request()->experience_content, "class" => "Team", "model_id" => $item->id],
            ['key' => "skill_one", "value" => request()->skill_one, "class" => "Team", "model_id" => $item->id],
            ['key' => "skill_one_rate", "value" => request()->skill_one_rate, "class" => "Team", "model_id" => $item->id],
            ['key' => "skill_tow", "value" => request()->skill_tow, "class" => "Team", "model_id" => $item->id],
            ['key' => "skill_tow_rate", "value" => request()->skill_tow_rate, "class" => "Team", "model_id" => $item->id],
            ['key' => "skill_three", "value" => request()->skill_three, "class" => "Team", "model_id" => $item->id],
            ['key' => "skill_three_rate", "value" => request()->skill_three_rate, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_one", "value" => request()->experience_one, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_one_duration", "value" => request()->experience_one_duration, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_tow", "value" => request()->experience_tow, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_tow_duration", "value" => request()->experience_tow_duration, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_three", "value" => request()->experience_three, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_three_duration", "value" => request()->experience_three_duration, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_four", "value" => request()->experience_four, "class" => "Team", "model_id" => $item->id],
            ['key' => "experience_four_duration", "value" => request()->experience_four_duration, "class" => "Team", "model_id" => $item->id],
        ]);

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
