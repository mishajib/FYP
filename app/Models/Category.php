<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name', 'slug'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }

    public function scopePending($query)
    {
        return $query->where('is_approved', 0);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeDeactive($query)
    {
        return $query->where('status', 0);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class)->withTimestamps();
    }
}
