@extends('frontend.vendor.layouts.app')
@section('title')
    <title>Vendor Products</title>
@endsection

@section('content')
    <style>
        .suspended {
            border: none;
            background: none;
            cursor: pointer;
        }

        .active {
            border: none;
            background: none;
            cursor: pointer;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">All Product</h5>
                    <a href="{{ route('vendor-product.create') }}" class="btn btn-outline-primary float-end">Create
                        Product</a>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Vendor</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $product->product_name }}</strong>
                                    </td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->user->email }}</td>
                                    <td><img src="{{ $product->image }}" height="50" width="50"
                                            onerror="this.src'{{ asset('images/default.png') }}'" alt=""></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('vendor-product.edit', $product->id) }}"><i
                                                        class="bx bx-edit-alt me-1 text-success"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ route('vendor-product.destroy', $product->id) }}"
                                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form{{ $product->id }}').submit();"><i
                                                        class="bx bx-trash me-1 text-danger"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    <form id="logout-form{{ $product->id }}"
                                        action="{{ route('vendor-product.destroy', $product->id) }}" method="POST" class="d-none">
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
    <script>
        function suspended(suspended_id) {
            var status = $('.suspended').val();
            $.ajax({
                url: "{{ route('product.suspended') }}",
                type: "get",
                data: {
                    suspended_id: suspended_id,
                    status: status
                },
                success: function(data) {

                    swal({
                        title: "Active",
                        text: "Product Active Successfully",
                        icon: "success",
                        button: "Ok",
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                }
            });
        }

        function active(active_id) {
            var status = $('.active').val();
            $.ajax({
                url: "{{ route('product.active') }}",
                type: "get",
                data: {
                    active_id: active_id,
                    status: status
                },
                success: function(data) {

                    swal({
                        title: "Suspended",
                        text: "Product Suspended Successfully",
                        icon: "success",
                        button: "Ok",
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                }
            });
        }
    </script>
@endsection
