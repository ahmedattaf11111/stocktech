<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationRequest;
use App\Models\Employee;
use App\Models\Student;
use App\Repositories\NotificationRepository;
use App\Commons\Traits\SMS;
use App\Models\Contest;
use App\Models\Event;

class NotificationController extends Controller
{
    use SMS;
    private $notificationRequest;
    public function __construct(NotificationRepository $notificationRequest)
    {
        $this->middleware('auth:admin');
        $this->notificationRequest = $notificationRequest;
    }

    public function store(NotificationRequest $request)
    {
        $brand = $this->notificationRequest->store($request->validated());
        if ($request->destination == 'all_users') {
            $employees = Employee::where("status", 1)->get();
            $students = Student::where("status", 1)->get();
            foreach ($employees as $employee) {
                $this->send($employee->phone, $request->subject, $request->message);
            }
            foreach ($students as $student) {
                $this->send($student->phone, $request->subject, $request->message);
            }
        } else if ($request->destination == 'all_employees') {
            $employees = Employee::where("status", 1)->get();
            foreach ($employees as $employee) {
                $this->send($employee->phone, $request->subject, $request->message);
            }
        } else if ($request->destination == 'all_students') {
            $students = Student::where("status", 1)->get();
            foreach ($students as $student) {
                $this->send($student->phone, $request->subject, $request->message);
            }
        } else if ($request->destination == 'student') {
            $students = Student::whereIn("id", $request->student_id)->get();
            foreach ($students as $student) {
                $this->send($student->phone, $request->subject, $request->message);
            }
        } else if ($request->destination == 'employee') {
            $employees = Employee::whereIn("id", $request->employee_id)->get();
            foreach ($employees as $employee) {
                $this->send($employee->phone, $request->subject, $request->message);
            }
        }
        return response()->json("Item created successfully with id : $brand->id");
    }

    public function index()
    {
        $text = isset(request()->text) ? request()->text : '';
        return $this->notificationRequest->getNotifications(
            $text,
            request()->page_size,
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
}
