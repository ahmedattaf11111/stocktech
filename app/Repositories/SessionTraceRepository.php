<?php

namespace App\Repositories;

use App\Models\SessionTrace;

class SessionTraceRepository
{

    public function store($input)
    {
        return SessionTrace::create($input);
    }

    public function getSessionTraces($text, $page_size, $session_id, $student_id)
    {
        if ($page_size) {
            return SessionTrace::where(function ($q) use ($text) {
                $q->whereRelation("student", "name", "like", "%$text%")
                    ->orWhereRelation("employee", "name", "like", "%$text%");
            })
                ->when($session_id, function ($q) use ($session_id) {
                    $q->where("session_id", $session_id);
                })
                ->when($student_id, function ($q) use ($student_id) {
                    $q->where("student_id", $student_id);
                })
                ->with(["employee", "session", "student"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return SessionTrace::get();
    }
}
