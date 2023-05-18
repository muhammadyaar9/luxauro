<?php

namespace App\Models\Admin;

use App\Models\Admin\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'order_id',
        'vendor_id',

    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
