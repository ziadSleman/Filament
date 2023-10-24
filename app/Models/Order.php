<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    protected $fillable = [
        'product_id',
        'category_id',
        'number',
        'total_price',
        'shipping_price',
        'notes',
    ];
}
