<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = ["student_ids"];
    public function mediaManager()
    {
        return $this->belongsTo(MediaManager::class);
    }
    public function national()
    {
        return $this->belongsTo(MediaManager::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class,EmployeeStudent::class, "employee_id", "student_id");
    }
}
