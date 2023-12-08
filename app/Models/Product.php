<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $casts=[
        "filter_setting"=>"json"
    ];
    use HasFactory;
    public function whiteMediaManager()
    {
        return $this->belongsTo(MediaManager::class);
    }
    public function blackMediaManager()
    {
        return $this->belongsTo(MediaManager::class);
    }
    public function baseCategory()
    {
        return $this->belongsTo(BaseCategory::class);
    }
    
}
