<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingType extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'title',
    //     'description',
    // ];
    protected $guarded = [];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
