<?php

namespace App\Models;

use App\Models\Charter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CharterDeliveryOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'charter_id',
        'delivery_option_id',
    ];


}
