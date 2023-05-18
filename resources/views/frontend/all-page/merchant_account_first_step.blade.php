@extends('frontend.layouts.app')
@section('content')
<div class="section-product-charter merchant-account-1">
    <div class="container">
        <div class="row col-lg-10 mx-auto gx-5">
            <div class="col-12 col-md-5 gx-0 gx-md-5 px-md-5">
                @include('frontend.include.sidebar')
            </div>
            <div class="col-12 col-md-7 gx-0 gx-md-1 gx-lg-5 px-lg-5">
                @if (\Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="my-account-section">
                    <h2>Setup Your Merchant Account (1/2)</h2>
                    <div class="mb-2"><strong>Business Information</strong></div>
                    <form action="{{route('merchant_account_second_step')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label mb-0">Business Name</label>
                            <input type="text" required name="business_name" value="{{ @$merchant_detail->business_name }}" class="form-control" value="">
                            <div class="pincel"></div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label class="uploadFile border rounded">
                                <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i>
                                <span class="filename">Upload Business Logo</span>
                                <input type="file" name="business_logo"  class="inputfile form-control">
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="uploadFile border rounded">
                                <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i>
                                <span class="filename">Upload Your Store Header</span>
                                <input type="file" class="inputfile form-control" name="store_header">
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label mb-0">Business Adress</label>
                            <input type="text" required name="business_address" value="{{ @$merchant_detail->business_address }}" class="form-control">
                            <div class="pincel"></div>
                        </div>
                        <div class="mb-3">
                            <label for="">Country</label>
                            <select class="form-select" name="country" id="country_id">
                                @foreach ($countries as $country)
                                    <option value="{{@$country->id}}" {{ @$country->id == @$merchant_detail->country ? 'selected' : '' }}>{{$country->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row gx-2 mb-0 mb-md-3">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <label for="" class="form-label mb-0">City</label>
                                <select id="city-id" class="form-control" name="city">
                                </select>
                                <div class="pincel"></div>
                            </div>
                            <div class="col-12 col-md-3 mb-3 mb-md-0">
                                <label for="">State</label>
                                <select class="form-select" name="state" id="state-id">
                                </select>
                            </div>
                            <div class="col-12 col-md-3 mb-3 mb-md-0">
                                <label for="" class="form-label mb-0">Zip Code</label>
                                <input type="text" required name="zip_code" value="{{ @$merchant_detail->zip_code }}" class="form-control">
                                <div class="pincel"></div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label mb-0">Business Email</label>
                            <input type="email" name="business_email" value="{{ @$merchant_detail->business_email }}" class="form-control">
                            <div class="pincel"></div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label mb-0">Business Website</label>
                            <input type="text" required name="business_website" value="{{ @$merchant_detail->business_website }}" class="form-control">
                            <div class="pincel"></div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label mb-0">Business Phone</label>
                            <input type="text" required name="business_phone" value="{{ @$merchant_detail->business_phone }}" class="form-control" placeholder="xxx-xxx-xxxx">
                            <div class="pincel"></div>
                        </div>
                        <div class="row gx-3 mb-0 mb-md-3">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <label for="" class="form-label mb-0">EIN</label>
                                <input type="text" required class="form-control" name="ein" value="{{ @$merchant_detail->ein }}" placeholder="xx-xxxxxxx">
                                <div class="pincel"></div>
                            </div>
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <label for="" class="form-label mb-0">Bank Account Number</label>
                                <input type="text" required name="bank_account_number" value="{{ @$merchant_detail->bank_account_number }}" class="form-control">
                                <div class="pincel"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label mb-0">Credit Card Number</label>
                            <input type="text" required name="credit_card_number" value="{{ @$merchant_detail->credit_card_number }}"  class="form-control">
                            <div class="pincel"></div>
                        </div>
                        <button class="btn btn-primary text-uppercase">Cancel</button>
                        <button class="btn btn-primary text-uppercase" type="submit">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var country_id = `{{ @$merchant_detail->country }}`;
        var state_id = `{{ @$merchant_detail->state }}`;
        var city_id = `{{ @$merchant_detail->city }}`;
        if (country_id) {
            var idCountry = country_id;
            $("#state-id").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state-id').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {
                        if (value.id == state_id) {
                            $("#state-id").append('<option value="' + value
                                .id + '" selected>' + value.name + '</option>');
                        } else {
                            $("#state-id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        }

                    });
                    $('#city-id').html('<option value="">Select City</option>');
                }
            });
        }
        if (state_id) {
            var idState = state_id;
            $("#city-id").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#city-id').html('<option value="">Select City</option>');
                    $.each(res.cities, function(key, value) {
                        if (value.id == city_id) {
                            $("#city-id").append('<option value="' + value
                                .id + '" selected>' + value.name + '</option>');
                        } else {
                            $("#city-id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        }

                    });
                }
            });
        }
        $('#country_id').on('change', function() {
            var idCountry = this.value;
            $("#state-id").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#state-id').html('<option value="">Select State</option>');
                    $.each(result.states, function(key, value) {
                        $("#state-id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-id').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-id').on('change', function() {
            var idState = this.value;
            $("#city-id").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#city-id').html('<option value="">Select City</option>');
                    $.each(res.cities, function(key, value) {
                        $("#city-id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection