@extends('frontend.layouts.app')
@section('title')
    <title>Murchant Application</title>
@endsection
@section('content')
    <div class="section-product-charter merchant-account-1">
        <div class="container">
            <div class="row col-lg-10 mx-auto gx-5">
                <div class="col-12 col-md-5 gx-0 gx-md-5 px-md-5">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-12 col-md-7 gx-0 gx-md-1 gx-lg-5 px-lg-5 py-3">
                    <div class="my-account-section">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <h2 class="mb-2 setup-merchant-heading">
                                Luxauro Merchant Application Account<span class="pagetext123"> (1/2)</span>
                            </h2>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active me-3" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true" onclick="checkpage1()">Business Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false" onclick="checkpage2()">Business
                                    Details</button>
                            </li>
                        </ul>
                        <form accept="{{ route('merchant_account_second_step') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="my-account-section business-information">
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Business Name</label>
                                            <input type="text"
                                                class="form-control @error('business_name') is-invalid @enderror"
                                                name="business_name" value="{{ old('business_name') }}">
                                            <div class="pincel"></div>

                                            @error('business_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label class="uploadFile border rounded">
                                                <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i>
                                                <span class="filename">Upload Business Logo</span>
                                                <input type="file"
                                                    class="inputfile form-control @error('business_logo') is-invalid @enderror"
                                                    name="business_logo">
                                                @error('business_logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="uploadFile border rounded">
                                                <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i>
                                                <span class="filename">Upload Your Store Header</span>
                                                <input type="file"
                                                    class="inputfile form-control @error('store_header') is-invalid @enderror"
                                                    name="store_header">
                                                @error('store_header')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Business Adress</label>
                                            <input type="text"
                                                class="form-control @error('business_address') is-invalid @enderror"
                                                name="business_address" value="{{ old('business_address') }}">
                                            <div class="pincel"></div>
                                            @error('business_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Country</label>
                                            <select class="form-select @error('country_id') is-invalid @enderror "
                                                id="country_id" name="country_id">
                                                <option value="" selected>-Select-</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">State</label>
                                            <select name="state_id" id="state-id"
                                                class="form-control @error('state_id') is-invalid @enderror">
                                                <option value="">Select State</option>
                                            </select>
                                            @error('state_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="">State</label>
                                            <select name="city_id" id="city-id"
                                                class="form-control @error('city_id') is-invalid @enderror">
                                                <option value="">Select State</option>
                                            </select>

                                            @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class=" mb-3 ">
                                            <label for="" class="form-label mb-0">Zip Code</label>
                                            <input type="number"
                                                class="form-control @error('zip_code') is-invalid @enderror"
                                                name="zip_code" value="{{ old('zip_code') }}">
                                            <div class="pincel"></div>
                                            @error('zip_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Business Email</label>
                                            <input type="email"
                                                class="form-control @error('business_email') is-invalid @enderror"
                                                name="business_email" value="{{ old('business_email') }}">
                                            <div class="pincel"></div>

                                            @error('business_email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Business Website</label>
                                            <input type="text"
                                                class="form-control @error('business_website') is-invalid @enderror"
                                                name="business_website" value="{{ old('business_website') }}">
                                            <div class="pincel"></div>

                                            @error('business_website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Business Phone</label>
                                            <input type="number"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                placeholder="xxx-xxx-xxxx" name="phone_number"
                                                value="{{ old('phone_number') }}">
                                            <div class="pincel"></div>

                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row gx-3 mb-0 mb-md-3">
                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">SSN / TIN</label>
                                                <input type="number"
                                                    class="form-control @error('ssn_tin') is-invalid @enderror"
                                                    placeholder="xx-xxxxxxx" name="ssn_tin" value="{{ old('ssn_tin') }}">
                                                <div class="pincel"></div>
                                                @error('ssn_tin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">EIN</label>
                                                <input type="number"
                                                    class="form-control @error('ein') is-invalid @enderror"
                                                    placeholder="xx-xxxxxxx" name="ein" value="{{ old('ein') }}">
                                                <div class="pincel"></div>

                                                @error('ein')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">Bank Account Number</label>
                                                <input type="number"
                                                    class="form-control @error('bank_account_number') is-invalid @enderror"
                                                    name="bank_account_number" value="{{ old('bank_account_number') }}">
                                                <div class="pincel"></div>

                                                @error('bank_account_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input checkIfCheck" type="checkbox"
                                                id="defaultCheck1" value="1" name="open_store">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Check here to open a Luxauro Suite (Store) <button type="button"
                                                    class="question-mark ms-1" data-toggle="tooltip" data-placement="top"
                                                    title="Uncheking this will allow you to sell up 7 products without an application fee (see Terms & Condition).">
                                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                </button>
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Credit Card Number</label>
                                            <input type="number"
                                                class="form-control @error('credit_card_number') is-invalid @enderror"
                                                name="credit_card_number" value="{{ old('credit_card_number') }}">
                                            <div class="pincel"></div>

                                            @error('credit_card_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <a href="" class="btn btn-primary text-uppercase text-white">Cancel</a>
                                        <button type="button" class="btn btn-primary text-uppercase checkIfCheckOrNot"
                                            onclick="nextbtn()" disabled>Next</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">

                                    <div class="form-outline mb-3">
                                        <label for="" class="form-label mb-0">Description / About Us</label>
                                        <textarea class="form-control @error('description_about_us') is-invalid @enderror" id="textAreaExample6"
                                            rows="2" name="description_about_us">{{ old('description_about_ud') }}</textarea>

                                        @error('description_about_us')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">What kind of business do you run?</label>
                                        <select class="form-select @error('business_run') is-invalid @enderror"
                                            name="business_run">
                                            <option value="">-Select-</option>
                                            <option value="business 1">business 1</option>
                                            <option value="business 2">business 2</option>
                                        </select>

                                        @error('business_run')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-groups mb-3">
                                        <label>Where do you offer to deliver your product?
                                            <button type="button" class="question-mark ms-1" data-toggle="tooltip"
                                                data-placement="top"
                                                title="How far are You willing to ship your products">
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                            </button>
                                        </label>
                                        <div class="input-type-check d-flex flex-wrap">
                                            @foreach ($delivery_options as $delivery_option)
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input @error('delivery_id') is-invalid @enderror "
                                                        type="radio" name="delivery_id"
                                                        value="{{ $delivery_option->id }}"
                                                        id="delivery_{{ $delivery_option->id }}"
                                                        {{ $delivery_option->id == old('delivery_id') ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="delivery_{{ $delivery_option->id }}">
                                                        {{ $delivery_option->name }}
                                                    </label>
                                                </div>
                                            @endforeach

                                            @error('delivery_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="row gx-4 mb-0 mb-md-3 align-items-end">
                                        <div class="col-12 col-md-8 mb-3 mb-md-0">
                                            <label for="" class="form-label mb-0">Social Media Link <span
                                                    class="optional">Optional</span></label>
                                            <input type="text" class="form-control" name="social_media_link[]">
                                            <div class="pincel"></div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                                            <button class="btn btn-primary add-more-width" type="button"
                                                onclick="addsociallink()"><span><i class="fa fa-plus me-2"
                                                        aria-hidden="true"></i></span>Add
                                                More</button>
                                        </div>
                                    </div>
                                    <div class="addToSocialLink">


                                    </div>
                                    <div class="mb-3">
                                        <h3>Meet the team: <span class="optional">Optional</span></h3>
                                        <div class="row gx-4 mb-0 mb-md-3 align-items-end">
                                            <div class="col-12 col-md-8 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">Owner Name-1</label>
                                                <input type="text" class="form-control" name="owner_name">
                                            </div>
                                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                                <label class="uploadFile">
                                                    <i class="fa fa-cloud-upload upload-icon" aria-hidden="true"></i>
                                                    <span class="filename">Upload Image</span>
                                                    <input type="file" class="inputfile form-control"
                                                        name="owner_image">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- <div class="mb-3">
                                            <button class="btn btn-primary" type="button"
                                                onclick="addownername()"><span><i class="fa fa-plus me-2"
                                                        aria-hidden="true"></i></span>Add
                                                More</button>
                                        </div> --}}
                                        <div class="addToOwnerName">

                                        </div>
                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0">Introduce The Owners
                                                    <span class="optional">Optional</span></label>
                                                <textarea class="form-control @error('owner_introduce') is-invalid @enderror" id="textAreaExample6" rows="2"
                                                    name="owner_introduce">{{ old('owner_introduce') }}</textarea>

                                                @error('owner_introduce')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row gx-4 mb-0 mb-md-3 align-items-end">
                                            <div class="col-12 col-md-8 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">Team Memeber
                                                    Name-1</label>
                                                <input type="text" class="form-control" name="team_memeber_name">
                                            </div>
                                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                                <label class="uploadFile">
                                                    <i class="fa fa-cloud-upload upload-icon" aria-hidden="true"></i>
                                                    <span class="filename">Upload Image</span>
                                                    <input type="file" class="inputfile form-control"
                                                        name="team_memeber_image">
                                                </label>
                                            </div>
                                        </div>

                                        {{-- <div class="mb-3">
                                            <button class="btn btn-primary" type="button"
                                                onclick="addTeamMemeber()"><span><i class="fa fa-plus me-2"
                                                        aria-hidden="true"></i></span>Add
                                                More</button>
                                        </div> --}}
                                        <div class="addToTeamMemebers">

                                        </div>

                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0">History <span
                                                        class="optional">Optional</span></label>
                                                <textarea class="form-control" id="textAreaExample6" rows="2" name="history"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0">Ethic <span
                                                        class="optional">Optional</span></label>
                                                <textarea class="form-control" id="textAreaExample6" rows="2" name="ethic"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0">Philosophy <span
                                                        class="optional">Optional</span></label>
                                                <textarea class="form-control" id="textAreaExample6" rows="2" name="philosophy"></textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary text-uppercase">Cancel</button>
                                        <button class="btn btn-primary text-uppercase">submit for review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var country_id = `{{ @$user->country }}`;
            var state_id = `{{ @$user->state }}`;
            var city_id = `{{ @$user->city }}`;
            if (country_id) {
                var idCountry = country_id;
                $("#state-id").html('');
                $.ajax({
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
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
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
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
                    url: "{{ url('api/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
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
                    url: "{{ url('api/fetch-cities') }}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{ csrf_token() }}'
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


    <script>
        function checkpage1() {

            $('.pagetext123').text(' (1/2)');
        }

        function checkpage2() {

            $('.pagetext123').text(' (2/2)');
        }

        function nextbtn() {
            $('#pills-profile-tab').addClass('active');
            $('#pills-profile-tab').attr('aria-selected', 'true');
            $('#pills-home-tab').removeClass('active');
            $('#pills-home-tab').attr('aria-selected', 'false');
            $('#pills-home').removeClass('active show');
            $('#pills-profile').addClass('active show');
            $('.pagetext123').text(' (2/2)');

        }

        function addsociallink() {
            let tempId = Math.floor(Math.random() * 1000000000);
            var html = '<div class="row gx-4 mb-0 mb-md-3 align-items-end reSocialLink' + tempId +
                '"> <div class="col-12 col-md-8 mb-3 mb-md-0"> <label for="" class="form-label mb-0">Social Media Link <span class="optional">Optional</span></label> <input type="text" class="form-control" name="social_media_link[]"> <div class="pincel"></div></div><div class="col-12 col-md-4 mb-3 mb-md-0"> <button class="btn btn-danger add-more-width" type="button" onclick="removesociallink(' +
                tempId +
                ')" ><span><i class="fa fa-minus" me-2" aria-hidden="true" ></i></span> Remove </button> </div></div>';
            $('.addToSocialLink').append(html);

        }

        function removesociallink(id) {
            $('.reSocialLink' + id).remove();
        }

        function addownername() {
            let tempId = Math.floor(Math.random() * 1000000000);
            let html = '<div class="addOwnername' + tempId +
                '"><h3>Meet the team: <span class="optional">Optional</span></h3> <div class="row gx-4 mb-0 mb-md-3 align-items-end"> <div class="col-12 col-md-8 mb-3 mb-md-0"> <label for="" class="form-label mb-0">Owner Name-1</label> <input type="text" class="form-control" name="owner_name[]"> </div><div class="col-12 col-md-4 mb-3 mb-md-0"> <label class="uploadFile"> <i class="fa fa-cloud-upload upload-icon" aria-hidden="true"></i> <span class="filename">Upload Image</span> <input type="file" class="inputfile form-control" name="owner_image[]"> </label> </div></div><div class="mb-3"> <button class="btn btn-danger" type="button" onclick="removeownername(' +
                tempId +
                ')"><span><i class="fa fa-minus me-2" aria-hidden="true"></i></span> Remove </button> </div></div>';
            $('.addToOwnerName').append(html);

        }

        function removeownername(id) {
            $('.addOwnername' + id).remove();
        }

        function addTeamMemeber() {
            let tempId = Math.floor(Math.random() * 1000000000);
            let html = '<div class="addteam' + tempId +
                '"><div class="row gx-4 mb-0 mb-md-3 align-items-end"> <div class="col-12 col-md-8 mb-3 mb-md-0"> <label for="" class="form-label mb-0">Team Memeber Name-1</label> <input type="text" class="form-control" name="team_memeber_name[]"> </div><div class="col-12 col-md-4 mb-3 mb-md-0"> <label class="uploadFile"> <i class="fa fa-cloud-upload upload-icon" aria-hidden="true"></i> <span class="filename">Upload Image</span> <input type="file" class="inputfile form-control" name="team_memeber_image[]"> </label> </div></div><div class="mb-3"> <button class="btn btn-danger" type="button" onclick="removeTeamMemeber(' +
                tempId +
                ')"><span><i class="fa fa-minus me-2" aria-hidden="true"></i></span> Remove </button> </div></div>';
            $('.addToTeamMemebers').append(html);
        }

        function removeTeamMemeber(id) {
            $('.addteam' + id).remove();
        }

        // checked radio button
        $(document).ready(function() {
            $('input[type="checkbox"]').click(function() {
                if ($(this).is(":checked")) {
                    $('.checkIfCheckOrNot').prop('disabled', false);
                }else{
                    $('.checkIfCheckOrNot').prop('disabled', true);
                }
            });
        });
    </script>
@endsection
