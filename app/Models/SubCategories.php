<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
