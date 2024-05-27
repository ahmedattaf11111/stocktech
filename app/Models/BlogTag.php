<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $guarded = [];
    use HasFactory;
    public $appends = ["name_trans"];
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, TagBlog::class, "tag_id", "blog_id");
    }
    
    public function getNameTransAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name;
    }
}
