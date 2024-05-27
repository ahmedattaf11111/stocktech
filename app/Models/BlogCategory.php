<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $appends = ["name_trans"];
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, CategoryBlog::class, "category_id", "blog_id");
    }
    public function getNameTransAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name;
    }
}
