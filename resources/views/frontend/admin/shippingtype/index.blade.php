@extends('frontend.admin.layouts.app')
@section('title')
    <title>All Shipping Type</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">All Shipping Type</h5>
                    <a href="{{ route('shipping-type.create') }}" class="btn btn-outline-primary float-end">Create Shipping
                        Type</a>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($shippingtypes as $shippingtype)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $shippingtype->title }}</strong>
                                    </td>
                                    <td>{{ $shippingtype->description }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('shipping-type.edit', $shippingtype->id) }}">
                                                    <i class="bx bx-edit-alt me-1 text-success"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="{{ route('shipping-type.destroy',$shippingtype->id) }}"  onclick="event.preventDefault();
                                                document.getElementById('logout-form{{ $shippingtype->id}}').submit();" >
                                                    <i class="bx bx-trash me-1 text-danger"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <form id="logout-form{{ $shippingtype->id}}" action="{{ route('shipping-type.destroy',$shippingtype->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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
