<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'c_name',
        'c_slug',
        'c_avatar',
        'c_banner',
        'c_description',
        'c_hot',
        'c_status',
    ];
}
