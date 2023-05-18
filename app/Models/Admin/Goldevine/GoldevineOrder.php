<?php

namespace App\Models\Admin\Goldevine;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldevineOrder extends Model
{
    use HasFactory;
    protected $table = 'goldevine_orders';
    protected $fillable = [
        'benefit_id',
        'user_id',
        'total_price',
        'quantity',
        'order_status',
        'payment_status',
        'payment_method',
        'project_id'


    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
}
