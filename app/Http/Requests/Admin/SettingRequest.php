<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            "footer_about_us" => "nullable",
            "employee_body" => "nullable",
            "supervisor_body" => "nullable",
            "blog_body" => "nullable",
            "event_body" => "nullable",

            "address" => "nullable",
            "phone" => "nullable",
            "email" => "nullable",
            "map_position" => "nullable",

            "facebook" => "nullable",
            "twitter" => "nullable",
            "youtube" => "nullable",
            "instgram" => "nullable",
            "snapchat" => "nullable",
            "linkedin" => "nullable",
        ];
    }
}
