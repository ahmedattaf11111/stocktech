<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function otherEmployee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
