<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'barcode_id',
        'sku',
        'product_name',
        'description',
        'cost_price',
        'selling_price',
        'stock_quantity',
        'minimum_stock',
        'unit',
        'image',
        'expiry_date',
        'status',
    ];
}
