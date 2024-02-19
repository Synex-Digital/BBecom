<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    function images()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id');
    }

    function services()
    {
        return $this->hasMany(ProductService::class, 'product_id');
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_products', 'product_id', 'campaign_id');
    }

    public function getFinalPriceAttribute()
    {
        return $this->price - ($this->price * $this->discount / 100);
    }
}
