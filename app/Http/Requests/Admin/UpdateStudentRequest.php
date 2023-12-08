<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            "name" => "required",
            "phone" => "nullable",
            "level_id" => "nullable",
            "guardian_id" => "nullable",
            "media_manager_id" => "nullable",
            "birth_id" => "nullable",
            "national_id" => "nullable",
        ];
    }
}
