<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSessionTraceRequest;
use App\Models\Employee;
use App\Models\Session;
use App\Models\Student;
use App\Repositories\SessionTraceRepository;

class SessionTraceController extends Controller
{
    private $sessionTraceRepository;
    public function __construct(SessionTraceRepository $sessionTraceRepository)
    {
        $this->middleware('auth:admin');
        $this->sessionTraceRepository = $sessionTraceRepository;
    }

    public function store(StoreSessionTraceRequest $request)
    {
        $brand = $this->sessionTraceRepository->store($request->validated());
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->sessionTraceRepository->getSessionTraces(
            $text,
            request()->page_size,
            request()->session_id,
            request()->student_id,
        );
    }

    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
    public function getAllSessions()
    {
        return Session::get();
    }
    public function getAllStudents()
    {
        return Student::where("status", 1)->get();
    }

    public function getSessions($employeeId)
    {
        return Session::where("employee_id", $employeeId)->get();
    }

    public function getStudents($employeeId)
    {
        return Employee::find($employeeId)->students;
    }

}
