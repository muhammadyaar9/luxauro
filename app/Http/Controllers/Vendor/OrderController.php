<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Admin\Cart;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','vendor']);
    }

    public function index()
    {
        $orders = Order::with('cart','user')->get();
        return view('frontend.vendor.order.index', compact('orders'));

    }

    public function invoice($id)
    {
        $order = Order::with('cart', 'user')->where('id', $id)->first();
        return view('frontend.vendor.order.invoice', compact('order'));
    }
}
