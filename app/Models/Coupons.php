<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'status',
        'ammount',
        'ammount_available',
        'price',
        'code',
        'start_date',
        'end_date'
    ];

    public function product() {
        return $this->belongsTo(Productss::class, 'product_id');
    }
    public function products()
    {
        return $this->belongsToMany(Productss::class);
    }
}
