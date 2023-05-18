<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharterSpecificationGeneral extends Model
{
    use HasFactory;
    protected $table = 'charter_specification_generals';
    protected $fillable = [
        'charter_id',
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
