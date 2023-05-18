<?php

namespace App\Models\Admin;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Pagination\LengthAwarePaginator;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
    ];

    // public function relatedProducts()
    // {
    //     return $this->hasMany(Product::class,'category_id','id');
    // }
    // public function products()
    // {
    //     return $this->hasMany(Product::class , 'category_id' , 'id');
    // }
    public function products()
    {
        return $this->belongsToMany(Product::class,'category_products');
    }

}
