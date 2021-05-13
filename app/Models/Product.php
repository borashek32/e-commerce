<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'description',
        'photo',
        'stock',
        'slug',
        'summary',
        'price',
        'brand_id',
        'offer_price',
        'discount',
        'condition',
        'status',
        'vendor_id',
        'category_id',
        'child_cat_id',
        'size',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function relatedProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id')
            ->limit(10);
    }
}
