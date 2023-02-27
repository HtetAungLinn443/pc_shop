<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOtherData extends Model
{
    use HasFactory;
    protected $fillable = [
        'item',
        'mainId',
        'main',
        'other_name',
        'data',

    ];
}