<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = "id";
    protected $fillable = ['pro_name', 'pro_slug', 'pro_price', 'pro_price_entry', 'pro_category_id', 'pro_admin_id', 'pro_sale', 'pro_avatar', 'pro_view', 'pro_hot', 'pro_active', 'pro_pay', 'pro_description', 'pro_content', 'pro_review_total', 'pro_review_star'];
}
