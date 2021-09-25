<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class, "store_id", "id");
    }

    public function product()
    {
        return $this->hasMany(Product::class, "store_id", "id");
    }
}
