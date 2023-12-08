<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            "employee_id" => "required",
            "session_id" => "required",
            "same_employee" => "nullable",
            "type" => "required",
            "other_employee_id" => "nullable",
            "student_id" => "nullable",
            "attend" => "required",
        ];
    }
}
