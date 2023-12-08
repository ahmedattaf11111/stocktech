<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttendanceRequest;
use App\Models\Employee;
use App\Models\Session;
use App\Models\Student;
use App\Repositories\AttendanceRepository;

class AttendanceController extends Controller
{
    private $attendanceRepository;
    public function __construct(AttendanceRepository $attendanceRepository)
    {
        $this->middleware('auth:admin');
        $this->attendanceRepository = $attendanceRepository;
    }

    public function store(AttendanceRequest $request)
    {
        $brand = $this->attendanceRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->attendanceRepository->getAttendances(
            $text,
            request()->page_size,
            request()->session_id,
            request()->same_employee,
        );
    }
    public function getStudents()
    {
        return Student::where("status", 1)->get();
    }

    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
    public function getSessions($employeeId)
    {
        return Session::where("employee_id", $employeeId)->get();
    }
    public function getAllSessions()
    {
        return Session::get();
    }
}
