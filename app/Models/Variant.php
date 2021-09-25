<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $guard = ["id"];

    public function type()
    {
        return $this->belongsTo(VariantType::class, "type_id", "id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
