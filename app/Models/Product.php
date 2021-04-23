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
        'offer_price',
        'discount',
        'condition',
        'status',
        'vendor_id',
        'cat_id',
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

//    public function categories()
//    {
//        return $this->belongsToMany(Category::class);
//    }
//
//    public function brand()
//    {
//        return $this->belongsTo(Brand::class);
//    }
}
