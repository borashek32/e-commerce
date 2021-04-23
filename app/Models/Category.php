<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'photo',
        'is_parent',
        'parent_id',
        'status'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function shiftChild($cat_id)
    {
        return Category::whereIn('id', $cat_id)->update(['is_parent' => 1]);
    }

    public static function getChildByParentId($id)
    {
        return Category::where('parent_id', $id)->pluck('title', 'id');
    }
}
