<?php

namespace App\Repositories;

use App\Exceptions\NotFoundException;
use App\Models\Attendance;

class AttendanceRepository
{
    public function store($input)
    {
        return Attendance::create($input);
    }
    public function getAttendances($text, $page_size, $session, $sameEmployee)
    {
        if ($page_size) {
            return Attendance::where(function ($q) use ($text) {
                $q->whereRelation("student", "name", "like", "%$text%")
                    ->orWhereRelation("employee", "name", "like", "%$text%");
            })
                ->when($session, function ($q) use ($session) {
                    $q->where("session_id", $session);
                })
                ->when($sameEmployee, function ($q) use ($sameEmployee) {
                    $q->where("same_employee", $sameEmployee);
                })
                ->with(["employee", "session", "student", "otherEmployee"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Attendance::get();
    }
}
