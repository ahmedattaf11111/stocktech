<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function mediaManager()
    {
        return $this->belongsTo(MediaManager::class);
    }
}
