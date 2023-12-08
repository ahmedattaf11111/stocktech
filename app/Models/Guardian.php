<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    use HasFactory;
    protected $guarded = [];
    public function mediaManager()
    {
        return $this->belongsTo(MediaManager::class);
    }
    public function national()
    {
        return $this->belongsTo(MediaManager::class);
    }
}
