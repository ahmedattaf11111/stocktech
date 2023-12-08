<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralRate extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        "rates" => "json",
        "created_at" => "date:y, d ,M"
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
