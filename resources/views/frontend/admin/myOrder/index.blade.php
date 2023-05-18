@extends('frontend.admin.layouts.app')
@section('title')
    <title>My Orders</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">My Orders</h5>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>payment type</th>
                                <th>payment status</th>
                                <th>SHIPPING CHARGE </th>
                                <th>total</th>
                                <th>INVOICE</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($orders as $order)
                                @php
                                    $total = 0;
                                    $shiping = 0;
                                    $myorders = $order->cart->where('vendor_id', auth()->user()->id);
                                @endphp
                                @foreach ($myorders as $cart)
                                    @if ($loop->last)
                                        <tr>
                                            <td>
                                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                <strong>{{ isset($cart->cart->product->user->userDetails->name) ? $cart->cart->product->user->userDetails->name : '' }}</strong>
                                            </td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>${{ $shiping += $cart->cart->product->shipping_charge }}</td>
                                            <td>${{ $total += $cart->cart->quantity * $cart->cart->product->product_price +$cart->cart->product->shipping_charge }}
                                            </td>
                                            <td>
                                                <a href="{{ route('order.myorder.invoice', $order->id) }}">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @else
                                        @php
                                            $shiping += $cart->cart->product->shipping_charge;
                                            $total += $cart->cart->quantity * $cart->cart->product->product_price + $shiping;
                                        @endphp
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
@endsection
