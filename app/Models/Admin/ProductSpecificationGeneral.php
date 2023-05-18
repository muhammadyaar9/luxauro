<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecificationGeneral extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'model_series_name',
        'model_number',
        'primary_meterial',
        'primary_meterial_subType',
        'delivery_condition',
        'suitable_for',
        'compatible_laptop_size',
        'foldable',
        'adjustable_height',
        'width',
        'height',
        'depth',
        'weight',
        'first_image',
        'first_description',
        'second_image',
        'second_description',
        'third_image',
        'third_description',
    ];
}
