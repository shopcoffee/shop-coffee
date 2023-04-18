<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Attributes extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'attribute_id',
    ];
}
