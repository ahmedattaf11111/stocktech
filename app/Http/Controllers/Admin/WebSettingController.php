<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WebSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|update setting")->only("save");
        $this->middleware("permission:super admin|view setting")->only(["show"]);
    }

    public function show()
    {
        $setting = WebSetting::first();
        return view("admin.web-setting", [
            "id" => $setting ? $setting->id : '',
            "privacy_policy" => $setting ? $setting->privacy_policy : '',
            "term_and_condition" => $setting ? $setting->term_and_condition : '',
            "app_name_en" => $setting ? $setting->app_name_en : '',
            "address" => $setting ? $setting->address : '',
            "phone" => $setting ? $setting->phone : '',
            "email" => $setting ? $setting->email : '',
            "contact_title" => $setting ? $setting->contact_title : '',
            "contact_content" => $setting ? $setting->contact_content : '',
            "white_logo" => $setting ? $setting->white_logo : '',
            "black_logo" => $setting ? $setting->black_logo : '',
            "review_image" => $setting ? $setting->review_image : '',
            "facebook" => $setting ? $setting->facebook : '',
            "instgram" => $setting ? $setting->instgram : '',
            "linkedin" => $setting ? $setting->linkedin : '',
            "youtube" => $setting ? $setting->youtube : '',
            "whatsapp" => $setting ? $setting->whatsapp : '',
            "snapchat" => $setting ? $setting->snapchat : '',
            "tiktok" => $setting ? $setting->tiktok : '',
            "twitter" => $setting ? $setting->twitter : '',
            "behance" => $setting  ? $setting->behance : '',
        ]);
    }
    public function save(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            "app_name_en" => "required",
            "address" => "required",
            "email" => "required",
            "contact_title" => "required",
            "contact_content" => "required",
            "privacy_policy" => "required",
            "term_and_condition" => "required",
            "phone" => "required",
            "white_logo" => "required",
            "black_logo" => "required",
            "review_image" => "required",
            "facebook" => "required",
            "instgram" => "required",
            "linkedin" => "required",
            "youtube" => "required",
            "whatsapp" => "required",
            "snapchat" => "required",
            "tiktok" => "required",
            "twitter" => "required",
            "behance" => "required",
        ]);
        $setting = WebSetting::first();
        $input = $v->validated();
        if ($setting) {
            if (request()->file("black_logo")) {
                $input["black_logo"] = request()->file("black_logo")->store("");
                Storage::delete($setting->black_logo);
            }
            if (request()->file("white_logo")) {
                $input["white_logo"] = request()->file("white_logo")->store("");
                Storage::delete($setting->white_logo);
            }
            if (request()->file("review_image")) {
                $input["review_image"] = request()->file("review_image")->store("");
                Storage::delete($setting->review_image);
            }

            $setting->update($input);
        } else {
            $input["black_logo"] = request()->file("black_logo")->store("");
            $input["white_logo"] = request()->file("white_logo")->store("");
            $input["review_image"] = request()->file("review_image")->store("");
            $setting = WebSetting::create($input);
        }
        insertDictionary([
            ['key' => "app_name_en", "value" => request()->app_name_en, "class" => "WebSetting", "model_id" => $setting->id],
            ['key' => "address", "value" => request()->address, "class" => "WebSetting", "model_id" => $setting->id],
            ['key' => "contact_title", "value" => request()->contact_title, "class" => "WebSetting", "model_id" => $setting->id],
            ['key' => "contact_content", "value" => request()->contact_content, "class" => "WebSetting", "model_id" => $setting->id],
            ['key' => "privacy_policy", "value" => request()->privacy_policy, "class" => "WebSetting", "model_id" => $setting->id],
            ['key' => "term_and_condition", "value" => request()->term_and_condition, "class" => "WebSetting", "model_id" => $setting->id],
        ]);
    }
}
