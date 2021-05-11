<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandVendor extends Model
{
    protected $table = 'brand_vendor';

    use HasFactory;

    protected $fillable =[
        'brand_id',
        'vendor_id'
    ];
}
