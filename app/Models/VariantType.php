<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantType extends Model
{
    use HasFactory;

    protected $guard = ["id"];

    public function variant()
    {
        return $this->hasMany(Variant::class, "type_id", "id");
    }
}
