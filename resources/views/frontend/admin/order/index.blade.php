@extends('frontend.admin.layouts.app')
@section('title')
    <title>All Orders</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">All Orders</h5>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>payment type</th>
                                <th>payment status</th>
                                <th>shipping charge</th>
                                <th>total</th>
                                <th>INVOICE</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ isset($order->user->userDetails->name) ?  $order->user->userDetails->name : '' }}</strong>
                                    </td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>${{ $order->shipping_charge }}</td>
                                    <td>${{ $order->over_all_total }}</td>
                                    <td><a href="{{ route('order.invoice',$order->id) }}">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
@endsection
