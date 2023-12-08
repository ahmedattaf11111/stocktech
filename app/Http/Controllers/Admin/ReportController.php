<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountItem;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\GeneralRate;
use App\Models\SessionTrace;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }
    public function getTotalHoursReport()
    {
        $employee = Employee::find(request()->employee_id);
        $attendances = Attendance::with("session")->where("employee_id", request()->employee_id)
            ->where("type", 1)->where("attend", 1)->whereBetween("created_at", [request()->start, request()->end])->get();
        $totalHours = 0;
        foreach ($attendances as $attendance) {
            $totalHours += (new Carbon($attendance->session->end))->diffInHours((new Carbon($attendance->session->start)));
        }
        return [
            "employee_name" => $employee->name,
            "total_hours" => $totalHours,
            "hour_price" => $employee->hour_price,
            "total_amount" => $employee->hour_price * $totalHours,
            "total_sessions" => $attendances->count()
        ];
    }
    public function getEmployees()
    {
        return Employee::where("status", 1)->get();
    }
    public function getAttendancesReport()
    {
        $item = null;
        if (request()->type == 1) {
            $item = Employee::find(request()->item_id);
        } else {
            $item = Student::find(request()->item_id);
        }

        $attendances = Attendance::where("type", request()->type)
            ->when(request()->type == 1, function ($q) {
                $q->where("employee_id", request()->item_id);
            })->when(request()->type == 0, function ($q) {
                $q->where("student_id", request()->item_id);
            })
            ->whereBetween("created_at", [request()->start, request()->end])->get();
        return [
            "name" => $item->name,
            "attendances" => $attendances->filter(function ($item) {
                return $item->attend == 1;
            })->count(),
            "absences" =>  $attendances->filter(function ($item) {
                return $item->attend == 0;
            })->count(),
        ];
    }
    public function getStudents()
    {
        return Student::where("status", 1)->get();
    }
    public function getSessionTraceReport()
    {
        $employee = Employee::find(request()->employee_id);
        $sessions = SessionTrace::select('student_id', DB::raw('sum(pages_no) as total_pages_no'))
            ->groupBy("student_id")->whereBetween("created_at", [request()->start, request()->end])->get();
        $students = Student::whereIn("id", $sessions->map(function ($session) {
            return $session->student_id;
        }))->get();
        $result = [];
        foreach ($sessions as $session) {
            $result[] = [
                "employee_name" => $employee->name,
                "student_name" => $students->filter(function ($student) use ($session) {
                    return $student->id == $session->student_id;
                })->first()->name,
                "total_pages_no" => $session->total_pages_no,
                "target" => $employee->target
            ];
        }
        return $result;
    }
    public function getBestStudentReport()
    {
        $rates = GeneralRate::groupBy("student_id")->select(
            "student_id",
            DB::raw("count(*) as count")
        )->get();
        $allRates = GeneralRate::get();
        $students = Student::with(["level", "guardian", "mediaManager"])->get();
        $__rates = [];
        foreach ($rates as $generalRate) {
            $totalStudentValue = 0;
            $totalRateValue = 0;
            $resRates = $allRates->filter(function ($el) use ($generalRate) {
                return $el->student_id == $generalRate->student_id;
            });
            foreach ($resRates as $resRate) {
                $totalStudentValue += collect($resRate->rates)->sum(function ($rt) {
                    return $rt["value"];
                });
                $totalRateValue += collect($resRate->rates)->sum(function ($rt) {
                    return $rt["length"];
                });
            }
            $generalRate->student = $students->filter(function ($s) use ($generalRate) {
                return $s->id == $generalRate->student_id;
            })->first();
            $generalRate->total_student_value = $totalStudentValue;
            $generalRate->total_rate_value = $totalRateValue;
            $__rates[] = $generalRate;
        }
        return collect($__rates)->sort(function ($r) {
            return -1 * $r["total_student_value"];
        })->slice(0, request()->limit);
    }
    public function getTotalExpensesRevenues()
    {
        $transactions = Transaction::whereBetween(
            "created_at",
            [request()->start, request()->end]
        )->get();
        $totalRevenues = $transactions->filter(function ($transaction) {
            return $transaction->amount <= 0;
        })
            ->sum(function ($transaction) {
                return $transaction->amount;
            });
        $totalExpenses = $transactions->filter(function ($transaction) {
            return $transaction->amount >= 0;
        })->sum(function ($transaction) {
            return $transaction->amount;
        });
        return [
            "total_expenses" => $totalExpenses,
            "total_revenues" => $totalRevenues,
            "total_amount" => $totalRevenues + $totalExpenses
        ];
    }
    public function getExpensesRevenues()
    {
        return Transaction::when(request()->account_item_id, function ($q) {
            $q->where("account_item_id", request()->account_item_id);
        })
            ->whereBetween("created_at", [request()->start, request()->end])
            ->with(["accountItem", "employee", "student"])
            ->orderBy("id", "desc")->paginate(request()->page_size);
    }
    public function getAccountItems()
    {
        return AccountItem::where("status", 1)->get();
    }
}
