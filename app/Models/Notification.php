<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = ["employee_id", "student_id"];
    use HasFactory;
    protected $casts = [
        "created_at" => "date:y d M"
    ];
    public function employees()
    {
        return $this->belongsToMany(
            Employee::class,
            NotificationEmployee::class,
            "notification_id",
            "employee_id"
        );
    }
    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            NotificationStudent::class,
            "notification_id",
            "student_id"
        );
    }
}
