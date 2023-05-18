<?php

namespace App\Models\Admin\Goldevine;

use App\Models\User;
use App\Models\Admin\Goldevine\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectBenefit extends Model
{
    use HasFactory;
    protected $table = 'project_benefits';
    protected $dates = ['estimated_delivery_date'];
    protected $fillable = [
        'benefit_name',
        'price',
        'benefit_msrp',
        'feature_image',
        'estimated_delivery_date',
        'quantity',
        'short_description',
        'project_id',
        'user_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
