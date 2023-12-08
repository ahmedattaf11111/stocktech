<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;
    protected $guarded = ["student_ids"];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function contestType()
    {
        return $this->belongsTo(ContestType::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, ContestStudent::class, "contest_id", "student_id");
    }
}
