@extends('frontend.admin.layouts.app')
@section('title')
    <title>All Merchant</title>
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
                    <h5 class="d-inline">All Merchant</h5>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Shop Name</th>
                                <th>Vendor Details</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($pendingVendors as $pendingVendor)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong> {{ $pendingVendor->email }}</strong>
                                    </td>
                                    <td>{{ isset($pendingVendor->merchant->business_name) ? $pendingVendor->merchant->business_name : '' }}</td>
                                    <td>
                                        @isset($pendingVendor->vendor)
                                            <i class="bi bi-eye display-5" onclick="showdata({{ $pendingVendor->vendor->id  }})" style="cursor: pointer"></i>
                                        @endisset


                                    </td>
                                    <td>
                                        @if ($pendingVendor->status == 'Active')
                                            <span
                                                class="badge rounded-pill bg-success">{{ $pendingVendor->status }}</span><br>
                                        @else
                                            <span
                                                class="badge rounded-pill bg-danger">{{ $pendingVendor->status }}</span><br>
                                        @endif
                                        @if ($pendingVendor->status == 'Active')
                                            <a href="{{ route('admin.adminactiveVendor', $pendingVendor->id) }}"
                                                class="active" value="Active">
                                                <i class="bi bi-toggle-on text-success display-5"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.suspendedVendor', $pendingVendor->id) }}"
                                                class="suspended" value="Suspended">
                                                <i class="bi bi-toggle-off text-danger display-5"></i>
                                            </a>
                                        @endif
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

    {{--  --}}
    <div class="modal fade" id="exLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Vendor Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <span>Business Name: </span><span><strong class="name"> </strong></span><br>
                            <span>Business Adress: </span><span><strong class="address"> </strong></span><br>
                            <span>State: </span><span><strong class="state"> </strong></span><br>
                            <span>Business Website: </span><span><strong class="business_website"> </strong></span><br>
                            <span>EIN: </span><span><strong class="ein"> </strong></span><br>
                            <span>Credit Card Number: </span><span><strong class="credit_card_number"> </strong></span><br>
                            <span>Deliver your product: </span><span><strong class="delevory_option"> </strong></span><br>


                        </div>
                        <div class="col-6">
                            <span>Business Email: </span><span><strong class="email"> </strong></span><br>
                            <span>Country: </span><span><strong class="country"> </strong></span><br>
                            <span>City: </span><span><strong class="city"> </strong></span><br>
                            <span>Business Phone: </span><span><strong class="business_phone"> </strong></span><br>
                            <span>Bank Account Number: </span><span><strong class="bank_account_no"> </strong></span><br>
                            <span>Description : </span><span><strong class="description"> </strong></span><br>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showdata(obj)
        {
            $.ajax({
                type: "GET",
                url: "{{ route('admin.showVendor') }}",
                data: {id:obj},
                dataType: "json",
                success: function (response) {
                    $('#exLargeModal').modal('show');
                    $('.name').text(response.name);
                    $('.email').text(response.email);
                    $('.address').text(response.address);
                    $('.state').text(response.state.name);
                    $('.country').text(response.country.name);
                    $('.city').text(response.city);
                    $('.business_website').text(response.business_website);
                    $('.business_phone').text(response.business_phone);
                    $('.ein').text(response.ein);
                    $('.credit_card_number').text(response.credit_card_number);
                    $('.delevory_option').text(response.delivery.title);
                    $('.description').text(response.description);
                    $('.bank_account_no').text(response.bank_account_number);
                }
            });
        }

    </script>
@endsection
