<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePlatform extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mediaManager()
    {
        return $this->belongsTo(MediaManager::class);
    }
}
