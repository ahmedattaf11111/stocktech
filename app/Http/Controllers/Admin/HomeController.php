<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use App\Models\Home;
use App\Models\Lang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|update career")->only("save");
        $this->middleware("permission:super admin|view career")->only(["show"]);
    }

    public function show()
    {
        $home = Home::first();
        return view("admin.home", [
            "id" => $home->id ?? '',
            "banner_content" => $home->banner_content ?? '',
            "banner_main_title" => $home->banner_main_title ?? '',
            "banner_first_title" => $home->banner_first_title ?? '',
            "banner_second_title" => $home->banner_second_title ?? '',
            "banner_image" => $home->banner_image ?? '',
            "intro_main_title" => $home->intro_main_title ?? '',
            "intro_second_title" => $home->intro_second_title ?? '',
            "intro_content" => $home->intro_content ?? '',
            "intro_one_number" => $home->intro_one_number ?? '',
            "intro_one_text" => $home->intro_one_text ?? '',
            "intro_tow_number" => $home->intro_tow_number ?? '',
            "intro_tow_text" => $home->intro_tow_text ?? '',
            "intro_video" => $home->intro_video ?? '',
            "adv_text" => $home->adv_text ?? '',
            "intro_image" => $home->intro_image ?? '',
            "banner_image" => $home->banner_image ?? '',
        ]);
    }
    public function save(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            "banner_content" => "required",
            "banner_main_title" => "required",
            "banner_first_title" => "required",
            "banner_second_title" => "required",
            "banner_image" => "nullable",
            "intro_main_title" => "required",
            "intro_second_title" => "required",
            "intro_content" => "required",
            "intro_one_number" => "required",
            "intro_one_text" => "required",
            "intro_tow_number" => "required",
            "intro_tow_text" => "required",
            "intro_video" => "required",
            "intro_image" => "nullable",
            "adv_text" => "required",
        ]);
        $home = Home::first();
        $input = $v->validated();
        if ($home) {
            if (request()->file("banner_image")) {
                $input["banner_image"] = request()->file("banner_image")->store("");
                Storage::delete($home->banner_image);
            }
            if (request()->file("intro_image")) {
                $input["intro_image"] = request()->file("intro_image")->store("");
                Storage::delete($home->intro_image);
            }
            $home->update($input);
        } else {
            $input["banner_image"] = request()->file("banner_image")->store("");
            $input["intro_image"] = request()->file("intro_image")->store("");
            Home::create($input);
        }
        insertDictionary([
            ['key' => "banner_content", "value" => request()->banner_content, "class" => "Home", "model_id" => $home->id],
            ['key' => "banner_main_title", "value" => request()->banner_main_title, "class" => "Home", "model_id" => $home->id],
            ['key' => "banner_first_title", "value" => request()->banner_first_title, "class" => "Home", "model_id" => $home->id],
            ['key' => "banner_second_title", "value" => request()->banner_second_title, "class" => "Home", "model_id" => $home->id],
            ['key' => "intro_main_title", "value" => request()->intro_main_title, "class" => "Home", "model_id" => $home->id],
            ['key' => "intro_second_title", "value" => request()->intro_second_title, "class" => "Home", "model_id" => $home->id],
            ['key' => "intro_content", "value" => request()->intro_content, "class" => "Home", "model_id" => $home->id],
            ['key' => "intro_one_number", "value" => request()->intro_one_number, "class" => "Home", "model_id" => $home->id],
            ['key' => "intro_one_text", "value" => request()->intro_one_text, "class" => "Home", "model_id" => $home->id],
            ['key' => "intro_tow_number", "value" => request()->intro_tow_number, "class" => "Home", "model_id" => $home->id],
            ['key' => "intro_tow_text", "value" => request()->intro_tow_text, "class" => "Home", "model_id" => $home->id],
            ['key' => "adv_text", "value" => request()->adv_text, "class" => "Home", "model_id" => $home->id],
        ]);
    }
}
