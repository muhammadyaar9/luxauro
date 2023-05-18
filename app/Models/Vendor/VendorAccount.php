<?php

namespace App\Models\Vendor;

use App\Models\Admin\DelivoryOption;
use App\Models\Vendor\Country;
use App\Models\Vendor\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'business_logo',
        'upload_your_store_header',
        'address',
        'country_id',
        'state_id',
        'city',
        'address',
        'email',
        'business_website',
        'business_phone',
        'ein',
        'bank_account_number',
        'credit_card_number',
        'description',
        'kind_of_business',
        'delivery_id',
        'social_media_link',
        'owner_name',
        'owner_image',
        'history',
        'ethic',
        'philosophy',
        'user_id',

    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function delivery()
    {
        return $this->hasOne(DelivoryOption::class,'id','delivery_id');
    }
}
