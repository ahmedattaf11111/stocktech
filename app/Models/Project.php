<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ["images" => "json"];
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}
