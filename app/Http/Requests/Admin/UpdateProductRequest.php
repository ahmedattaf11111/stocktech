<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            "id" => "required",
            "name_ar" => "required",
            "name_en" => "required",
            "description" => "required",
            "short_description" => "required",
            "white_media_manager_id" => "nullable",
            "black_media_manager_id" => "nullable",
            "base_category_id" => "required",
            "url" => "required",
            "with_photo" => "required",
            "filter_setting" => "nullable",
        ];
    }
}
