<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_image',
        'price',
        'main_category',
        'second_category',
        'brand_name',
        'brand_image',
        'path_number',
        'barcode',
        'commercial_warranty',
        'legal_warranty',
        'stock_count',
        'mainId',
    ];
}
