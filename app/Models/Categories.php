<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'image'];

    public function subcategories()
    {
        return $this->hasMany(SubCategories::class);
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }


}
