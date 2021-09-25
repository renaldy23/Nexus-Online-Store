<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guard = ["id"];

    public function store()
    {
        return $this->belongsTo(Store::class, "store_id", "id");
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, "product_id", "id");
    }

    public function variant()
    {
        return $this->hasMany(Variant::class, "product_id", "id");
    }

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
