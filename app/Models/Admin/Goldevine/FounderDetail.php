<?php

namespace App\Models\Admin\Goldevine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FounderDetail extends Model
{
    use HasFactory;
    protected $table = 'founder_details';
    protected $fillable = [
        'business_address',
        'city',
        'founder_state',
        'zip_code',
        'email',
        'website',
        'phone',
        'ein',
        'bank_account',
        'cart_number',
        'project_id',
        'user_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
