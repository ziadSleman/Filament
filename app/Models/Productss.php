<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productss extends Model
{
    use HasFactory;
    protected $table = 'productss';
    protected $fillable = [
        'name',
        'slug',
        'image_url',
        'description',
        'price',
        'quantity',
        'is_visible',
        'is_featured',
        'published_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    // public function coupons()
    // {
    //     return $this->hasMany(Product::class);
    // }
}
