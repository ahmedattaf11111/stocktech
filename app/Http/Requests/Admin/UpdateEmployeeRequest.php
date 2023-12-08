<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            "job" => "nullable",
            "hour_price" => "nullable",
            "target" => "nullable",
            "media_manager_id" => "nullable",
            "national_id" => "nullable",
            "phone" => "nullable",
            "address" => "nullable",
            "cv" => "nullable",
            "student_ids" => "nullable",
        ];
    }
}
