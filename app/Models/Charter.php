<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use App\Models\Admin\DeliveryOption;
use App\Models\CharterDeliveryOption;
use Illuminate\Database\Eloquent\Model;
use App\Models\CharterAvaliabiltyDateAndTime;
use App\Models\Admin\CharterSpecificationGeneral;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Charter extends Model
{
    use HasFactory;
    use Taggable;
    protected $table = 'charters';
    protected $Dates = ['date_of_avalability'];
    protected $fillable = [
        'charter_name',
        'charter_type',
        'rate',
        'hr_select',
        'description',
        'date_of_avalability',
        'start_time',
        'end_time',
        'max_guests',
        'terms_condition',
        'thumbnail_img',
        'charter_agreement',
        'tags',
        'user_id',
        'status',
    ];

    public function charterDeliveryOptions()
    {
        return $this->belongsToMany(DeliveryOption::class, 'charter_delivery_options');
    }

    public function charterAvaliabiltyDateAndTimes()
    {
        return $this->hasMany(CharterAvaliabiltyDateAndTime::class);
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public function charterSpecificationGeneral()
    {
        return $this->hasOne(CharterSpecificationGeneral::class);
    }



}
