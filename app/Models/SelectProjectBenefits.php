<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Goldevine\ProjectBenefit;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SelectProjectBenefits extends Model
{
    use HasFactory;
    protected $fillable = [
        'benefit_id',
        'user_id',
        'temp_id',
        'status',
    ];

    public function project_benefit()
    {
        return $this->belongsTo(ProjectBenefit::class, 'benefit_id');
    }
}
