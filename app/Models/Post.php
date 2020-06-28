<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //laravel local scope query for checking database field
    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }
}
