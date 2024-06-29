<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminSettingController extends Controller
{
    public function save(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'app_name_en' => "required",
            'color' => "nullable",
            'image' => "nullable",
        ]);
        if ($v->fails()) {
            return response()->json($v->errors(), 422);
        }
        $image = null;
        $input = $v->validated();
        if ($request->file("image")) {
            $image = $request->file("image")->store("");
            $input["image"] = $image;
        }
        $adminSetting = AdminSetting::first();
        if ($adminSetting) {
            if ($request->file("image") && $adminSetting->image) {
                Storage::delete($adminSetting->image);
            }
            $adminSetting->update($input);
        } else {
            $adminSetting = AdminSetting::create($input);
        }
        insertDictionary([
            ['key' => "app_name_en", "value" => request()->app_name_en, "class" => "AdminSetting", "model_id" => $adminSetting->id],
        ]);
    }
    public function show()
    {
        return AdminSetting::first();
    }
}
