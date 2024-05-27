<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:super admin|update career")->only("save");
        $this->middleware("permission:super admin|view career")->only(["show"]);
    }

    public function show()
    {
        $about = About::first();
        return view("admin.about", [
            "service_title" => $about ? $about->service_title : '',
            "images" => $about ? $about->images : '',
            "service_content" => $about ? $about->service_content : '',
            "experience_one" => $about ? $about->experience_one : '',
            "experience_one_rate" => $about ? $about->experience_one_rate : '',
            "experience_tow" => $about ? $about->experience_tow : '',
            "experience_tow_rate" => $about ? $about->experience_tow_rate : '',
            "experience_main_content" => $about ? $about->experience_main_content : '',
            "experience_second_content" => $about ? $about->experience_second_content : '',
            "experience_number" => $about ? $about->experience_number : '',
            "experience_number_text" => $about ? $about->experience_number_text : '',
            "id" => $about ? $about->id : ''
        ]);
    }
    public function save(Request $request)
    {
        // Validator request
        $v = Validator::make($request->all(), [
            'service_title' => "required",
            'service_content' => "required",
            "images" => "nullable",
            "experience_one" => "required",
            "experience_one_rate" => "required",
            "experience_tow" => "required",
            "experience_tow_rate" => "required",
            "experience_main_content" => "required",
            "experience_second_content" => "required",
            "experience_number" => "required",
            "experience_number_text" => "required"
        ]);
        $about = About::first();
        $input = $v->validated();
        if ($about) {
            if (request()->file("images")) {
                foreach ($about->images as $image) {
                    Storage::delete($image);
                }
                $images = [];
                foreach (request()->file("images") as $file) {
                    $images[] = $file->store("");
                }
                $input["images"] = $images;
            }
            $about->update($input);
        } else {
            $images = [];
            foreach (request()->file("images") as $file) {
                $images[] = $file->store("");
            }
            $input["images"] = $images;
            About::create($input);
        }
        return $input["images"] ?? [];
    }
    public function deleteImage($image)
    {
        $about = About::first();
        $about->images = collect($about->images)->filter(function ($_image) use($image) {
            return $image != $_image;
        })->toArray();
        Storage::delete($image);
        $about->save();
        return $about->images;
    }
}
