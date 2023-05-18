<?php

namespace App\Models;

use App\Models\Admin\Goldevine\Project;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Goldevine\GoldevineOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoldevineOrderDenefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'goldevine_order_id',
        'benefit_id',
        'user_id',
        'temp_id',
        'status',
    ];

    public function project_benefit()
    {
        return $this->belongsTo(ProjectBenefit::class, 'benefit_id');
    }

    public function goldevine_order()
    {
        return $this->belongsTo(GoldevineOrder::class, 'goldevine_order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
