<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Cart;
use App\Models\Admin\CartOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_type',
        'payment_status',
        'status',
        'total_price',
        'luxaurosub_total',
        'shipping_charge',
        'discount',
        'over_all_total',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->hasMany(CartOrder::class,'order_id','id');
    }
}
