<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralRate;
use App\Models\Rate;
use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getStudents()
    {
        return Student::with(["guardian", "level", "mediaManager"])->where("status", 1)->get();
    }
    public function getStudent($id)
    {
        return Student::with("mediaManager")->find($id);
    }
    public function getRates()
    {
        return Rate::where("status", 1)->get();
    }
    public function getStudentRates($studentId)
    {
        return GeneralRate::where("student_id", $studentId)->get();
    }
    public function getGuardians()
    {
        return Guardian::where("status", 1)->get();
    }

    public function getGuardianStudents($guardianId)
    {
        return Student::where("status", 1)->where("guardian_id", $guardianId)->get();
    }
}
