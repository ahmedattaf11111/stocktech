<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $guarded = ["categories_ids"];
    public $appends = ["name_trans", "content_trans"];
    public function blogCategories()
    {
        return $this->belongsToMany(BlogCategory::class, CategoryBlog::class, "blog_id", "category_id");
    }

    public function blogTags()
    {
        return $this->belongsToMany(BlogTag::class, TagBlog::class, "blog_id", "tag_id");
    }
    public function getNameTransAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->name_ar : $this->name;
    }
    public function getContentTransAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->content_ar : $this->content;
    }
}
