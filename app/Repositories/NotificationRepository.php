<?php

namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository
{
    public function store($input)
    {
        $notification = Notification::create($input);
        if (isset($input["employee_id"]) && $input["employee_id"]) {
            $notification->employees()->sync($input["employee_id"]);
        }
        if (isset($input["student_id"]) && $input["student_id"]) {
            $notification->students()->sync($input["student_id"]);
        }
        return $notification;
    }
    public function getNotifications($text, $page_size)
    {
        if ($page_size) {
            return Notification::where(function ($q) use ($text) {
            })
                ->with(["employees", "students"])
                ->orderBy("id", "desc")->paginate($page_size);
        }
        return Notification::get();
    }
}
