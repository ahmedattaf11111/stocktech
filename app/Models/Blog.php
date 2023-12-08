<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $casts = [
        "created_at" => "date:d M"
    ];
    protected $guarded = [];
    public function mediaManager()
    {
        return $this->belongsTo(MediaManager::class);
    }
}
