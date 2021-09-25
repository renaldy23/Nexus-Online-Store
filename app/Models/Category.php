<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function store()
    {
        return $this->belongsTo(Store::class, "store_id", "id");
    }

    public function product()
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }
}
