<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ["images" => "json"];
    public function careerTeam()
    {
        return $this->belongsTo(CareerTeam::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
 
    public function careerType()
    {
        return $this->belongsTo(CareerType::class);
    }
    
}
