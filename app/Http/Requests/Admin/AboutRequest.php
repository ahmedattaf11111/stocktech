<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "main_header" => "required",
            "second_header" => "nullable",
            "small_header" => "nullable",
            "first_body" => "nullable",
            "second_body" => "nullable",
            "point_one" => "nullable",
            "point_tow" => "nullable",
            "point_three" => "nullable",
            "video_url" => "nullable",
            "media_manager_id" => "nullable",
        ];
    }
}
