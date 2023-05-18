@extends('frontend.layouts.app')

@section('title')
    <title>
        Suite Management
    </title>
@endsection
@section('content')
    <div class="inner-content">
        <div class="section-product-charter">
            <div class="container">
                <div class="row col-lg-9 mx-auto gx-5">
                    <div class="col-12 col-md-4 gx-0 gx-md-5">
                        @include('frontend.include.sidebar')
                    </div>
                    <div class="col-12 col-md-8 gx-0 gx-md-5 px-md-5">
                        <h2 class="mb-2" style="font-size: 22px; font-weight: 600;">Suite Management </h2>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Businss Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link mx-2 mx-md-3" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Businss Details</button>
                            </li>
                        </ul>
                        <form action="{{ route('suits.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="application_id" value="{{ $suite->id }}">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="section-business-information">
                                        <div class="business-name business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">
                                                Business Name
                                                <div class="pincel in-edit" id="edit-button"></div>
                                            </div>
                                            <input class="border-0 text-edit bg-transparent d-block fw-bold" type="text"
                                                id="edit" name="business_name" value="{{ $suite->business_name }}" disabled>

                                        </div>
                                        <div class="business-logo mb-3">
                                            <div class="d-flex mb-3" style="color: #6a6969;">Business Logo </div>
                                            <div class="my-account-image ms-2">
                                                <div class="circle-images">
                                                    <img class="profile-pic-logo img-fluid"
                                                        src="{{ $suite->business_logo }}" width="100px;"
                                                        onerror="this.src='{{ asset('images/users.jfif') }}'">

                                                </div>
                                                <div class="p-image business-logo-icon">
                                                    <i class="fa fa-cloud-upload upload-button-logo" aria-hidden="true"></i>
                                                    <input class="file-upload-logo" type="file" accept="image"
                                                        name="business_logo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="business-header mb-3">
                                            <div class="d-block mb-3" style="color: #6a6969;">Store Header </div>
                                            <div class="border d-inline-block rounded">
                                                <div class="my-business-banner d-flex p-1">
                                                    <div class="business-banner">
                                                        <img class="profile-pic-banner img-fluid w-100"
                                                            src="{{ $suite->store_header }}"
                                                            onerror="this.src='{{ asset('images/default.png') }}'"   >

                                                    </div>
                                                    <div class="p-image upload-logos">
                                                        <i class="fa fa-cloud-upload upload-button-banner"
                                                            aria-hidden="true"></i>
                                                        <input class="file-upload-banner" type="file" accept="image"
                                                            name="store_header">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="business-address business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">Business Address <div
                                                    class="pincel e-adress"></div>
                                            </div>
                                            <input type="text" class="w-100 ms-2 text-adress fw-bold d-block border-0"
                                                value="{{ $suite->business_address }}" name="business_address" disabled>

                                        </div>
                                        <div class="business-address business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">Business Email <div
                                                    class="pincel b-email "></div>
                                            </div>
                                            <input type="text" class="w-100 ms-2 text-email fw-bold d-block border-0"
                                                name="business_email" value="{{$suite->business_email }}" disabled>
                                        </div>
                                        <div class="business-address business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">Business Website <div
                                                    class="pincel b-website"></div>
                                            </div>
                                            <input type="text" class="w-100 ms-2 text-website fw-bold d-block border-0"
                                                name="business_website" value="{{ $suite->business_website }}" disabled>
                                        </div>
                                        <div class="business-address business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">Business Phone <div
                                                    class="pincel b-number"></div>
                                            </div>
                                            <input type="text" class="ms-2 text-number fw-bold d-block border-0"
                                                name="phone_number" value="{{ $suite->phone_number }}" disabled>

                                        </div>
                                        <div class="business-address business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">SSN / TIN<div
                                                    class="pincel ssn-tin"></div>
                                            </div>
                                            <input type="text" class="ms-2 text-ssn fw-bold d-block border-0"
                                                name="ssn_tin" value="{{ $suite->ssn_tin }}" disabled>
                                        </div>

                                        <div class="business-address business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">EIN <div
                                                    class="pincel ein-tin"></div>
                                            </div>
                                            <input type="text" class="ms-2 text-ein fw-bold d-block border-0"
                                                name="ein" value="{{ $suite->ein }}" disabled>
                                        </div>
                                        <div class="business-address business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">Deposit Bank Account
                                                <div class="pincel bank-account"></div>
                                            </div>
                                            <input type="text" class="ms-2 text-bank-account fw-bold d-block border-0"
                                                name="bank_account_number" value="{{ $suite->bank_account_number }}"
                                                disabled>
                                        </div>


                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox"
                                                id="defaultCheck1" value="1" name="open_store" {{  $suite->open_store == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Check here to open a Luxauro Suite (Store) <button type="button"
                                                    class="question-mark ms-1" data-toggle="tooltip" data-placement="top"
                                                    title="Uncheking this will allow you to sell up 7 products without an application fee (see Terms & Condition).">
                                                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                </button>
                                            </label>
                                        </div>



                                        <div class="business-address business-section mb-3">
                                            <div class="d-inline-block mb-2" style="color: #6a6969;">Credit Card Number
                                                <div class="pincel credit-account"></div>
                                            </div>
                                            <input type="text"
                                                class="ms-2 text-credit-account fw-bold d-block border-0"
                                                name="credit_card_number" value="{{ $suite->credit_card_number }}"
                                                disabled>
                                        </div>
                                        <a href="{{ route('home') }}"
                                            class="btn btn-primary text-uppercase text-white p-2">Cancel</a>
                                        <button type="submit" class="btn btn-primary text-uppercase"
                                            onclick="this.form.submit();this.disabled">Save</button>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="business-address business-section mb-3">
                                        <div class="d-inline-block mb-2" style="color: #6a6969;">Description / About Us
                                            <div class="pincel about-us"></div>
                                        </div>
                                        <input type="text" class="ms-2 text-about-us fw-bold d-block border-0 w-100"
                                            name="description_about_us" value="{{ $suite->description_about_us }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">What kind of business do you run?</label>
                                        <select class="form-select" name="business_run">
                                            <option value="">-Select-</option>
                                            <option {{ $suite->business_run == 'business 1' ? 'selected' : '' }}>business 1
                                            </option>
                                            <option {{ $suite->business_run == 'business 2' ? 'selected' : '' }}>business 2
                                            </option>
                                        </select>
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
                                            @foreach ($delivory_options as $delivory_option)
                                                <div class="form-check">
                                                    <input class="form-check-input delivery-option" type="checkbox"
                                                        value="{{ $delivory_option->id }}"
                                                        id="flexCheckDefault{{ $delivory_option->id }}"
                                                        {{ $delivory_option->id == $suite->delivery_id ? 'checked' : '' }}
                                                        name="delivery_option" />
                                                    <label class="form-check-label"
                                                        for="flexCheckDefault{{ $delivory_option->id }}">
                                                        {{ $delivory_option->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="add-append">
                                        @php
                                            $first = true;
                                            $temp = 0;
                                        @endphp
                                        @foreach (json_decode($suite->social_media_link) as $social_medi)
                                            @php
                                                $temp = $temp + 1;
                                            @endphp
                                            @if ($first)
                                                <div class="business-address business-section mb-3" id="items">
                                                    <div class="d-inline-block mb-2" style="color: #6a6969;">Social Media
                                                        Link
                                                        <div class="pincel social-media"></div>
                                                    </div>
                                                    <input type="text"
                                                        class="ms-2 mb-2 text-social-media fw-bold d-block border-0 w-100"
                                                        value="{{ $social_medi }}" name="social_media_link[]"
                                                        placeholder="Social Media Link" disabled>
                                                    <div class="mb-3">
                                                        <button id="add" class="btn btn-primary" type="button"
                                                            onclick="addMoreSocialLink()"><span><i class="fa fa-plus me-2"
                                                                    aria-hidden="true"></i></span>Add
                                                            More</button>
                                                    </div>

                                                </div>
                                                <div class="appenSocialMediaLink">

                                                </div>
                                            @else
                                                <div class="business-address business-section mb-3 removesociallinks{{ $temp }}"
                                                    id="items">
                                                    {{-- <div class="d-inline-block mb-2" style="color: #6a6969;">Social Media Link
                                                    <div class="pincel social-media"></div>
                                                </div> --}}
                                                    <input type="text"
                                                        class="ms-2 mb-2 text-social-media fw-bold d-block border-0 w-100"
                                                        name="social_media_link[]" placeholder="Social Media Link"
                                                        value="{{ $social_medi }}">
                                                    <button class="btn btn-danger remove"
                                                        onclick="RemoveMediaLink({{ $temp }})"
                                                        type="button"><span><i class="fa fa-minus me-2"
                                                                aria-hidden="true"></i></span>Remove
                                                    </button>

                                                </div>
                                            @endif
                                            @php
                                                $first = false;
                                            @endphp
                                        @endforeach
                                    </div>

                                    <div class="mb-3 mt-1">
                                        <h3>Meet the team:</h3>
                                    </div>
                                    {{-- @foreach (json_decode($suite->owner_image, true) as $key => $image) --}}
                                    {{-- {{ dd($image) }} --}}

                                    <div class="owner-flex d-flex">
                                        <div class="owner-name">
                                            <div class="my-account-image">
                                                <div class="circle-images">
                                                    <img class="profile-pic img-fluid w-100"
                                                        src="{{ $suite->owner_image }}"
                                                        onerror="this.src='{{ asset('images/users.jfif') }}'">
                                                </div>
                                                <div class="p-image upload-logo">
                                                    <i class="fa fa-cloud-upload upload-button" aria-hidden="true"></i>
                                                    <input class="file-upload" type="file" accept="image" name="owner_image">
                                                </div>
                                            </div>
                                            <div class="business-address business-section mb-3">
                                                <div class="d-inline-block mb-0" style="color: #6a6969;">Owner Name-1
                                                    <div class="pincel jhon-smith-2"></div>
                                                </div>
                                                <input type="text"
                                                    class="ms-2 text-john-smith fw-bold d-block border-0 w-100" value="{{ $suite->owner_name }}" name="owner_name" disabled >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="business-address business-section mb-3">
                                        <div class="d-inline-block mb-2" style="color: #6a6969;">Introduce the Owner<div
                                                class="pincel the-owner"></div>
                                        </div>
                                        <input type="text"
                                            class="ms-2 text-the-owner fw-bold d-block border-0 w-100" value="{{ $suite->owner_introduce }}" name="owner_introduce" disabled>
                                    </div>
                                    <div class="business-address business-section mb-3">
                                        <div class="d-inline-block mb-2" style="color: #6a6969;">History <div
                                                class="pincel history"></div>
                                        </div>
                                        <input type="text"
                                            class="ms-2 text-history fw-bold d-block border-0 w-100"value="{{ $suite->history }}"
                                            disabled  name="history">
                                    </div>
                                    <div class="business-address business-section mb-3">
                                        <div class="d-inline-block mb-2" style="color: #6a6969;">Ethics <div
                                                class="pincel ethics-1"></div>
                                        </div>
                                        <input type="text"
                                            class="ms-2 text-ethics fw-bold d-block border-0 w-100" name="ethic" value="{{ $suite->ethic }}"  disabled>
                                    </div>
                                    <div class="business-address business-section mb-3">
                                        <div class="d-inline-block mb-2" style="color: #6a6969;">Philosophy <div
                                                class="pincel philosophy"></div>
                                        </div>
                                        <input type="text"
                                            class="ms-2 text-philosophy fw-bold d-block border-0 w-100" name="philosophy" value="{{ $suite->philosophy }}" disabled>
                                    </div>
                                    <button class="btn btn-primary text-uppercase">Cancel</button>
                                    <button type="submit" class="btn btn-primary text-uppercase"
                                        onclick="this.form.submit();this.disabled">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function RemoveOwnerImage(id) {
            $('.ownerimageremove' + id).remove();
        }

        function addMoreSocialLink() {
            let randomid = Math.floor(Math.random() * 1000000000);
            let html = '<div class="addorRemove' + randomid +
                ' py-2"><input type="text"class="ms-2 mb-2 text-social-media fw-bold d-block border-0 w-100" name="social_media_link[]" placeholder="Social Media Link" value="" ><button onClick="RemoveLink(' +
                randomid +
                ')" class="btn btn-danger remove" type="button"><span><i class="fa fa-minus me-2" aria-hidden="true"></i></span> Remove </button></div>';

            $('.appenSocialMediaLink').append(html);

        }

        function RemoveLink(id) {
            $('.addorRemove' + id).remove();
        }

        function RemoveMediaLink(id) {
            $('.removesociallinks' + id).remove();
        }





        $(document).ready(function() {

            $(document).ready(function() {
                $('.delivery-option').click(function() {
                    $('.delivery-option').not(this).prop('checked', false);
                });
            });




            $(document).ready(function() {
                var readURL = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('.profile-pic').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $(".file-upload").on('change', function() {
                    readURL(this);
                });

                $(".upload-button").on('click', function() {
                    $(".file-upload").click();
                });
            });






            var readURL2 = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.profile-pitcher').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-uplo").on('change', function() {
                readURL2(this);
            });

            $(".upload-btn").on('click', function() {
                $(".file-uplo").click();
            });


            $(document).ready(function() {
                var readURL3 = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.profile-pic-3').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $(".file-upload-3").on('change', function() {
                    readURL3(this);
                });

                $(".upload-button-3").on('click', function() {
                    $(".file-upload-3").click();
                });
            });

            $(document).ready(function() {
                var readURL4 = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.profile-pic-logo').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $(".file-upload-logo").on('change', function() {
                    readURL4(this);
                });

                $(".upload-button-logo").on('click', function() {
                    $(".file-upload-logo").click();
                });
            });

            $(document).ready(function() {
                var readURL5 = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.profile-pic-banner').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $(".file-upload-banner").on('change', function() {
                    readURL5(this);
                });

                $(".upload-button-banner").on('click', function() {
                    $(".file-upload-banner").click();
                });
            });






            $('.in-edit').on('click', function() {
                var $textEdit = $('.text-edit');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.e-adress').on('click', function() {
                var $textEdit = $('.text-adress');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.b-email').on('click', function() {
                var $textEdit = $('.text-email');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.b-website').on('click', function() {
                var $textEdit = $('.text-website');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.b-number').on('click', function() {
                var $textEdit = $('.text-number');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.ein-tin').on('click', function() {
                var $textEdit = $('.text-ein');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.ssn-tin').on('click', function() {
                var $textEdit = $('.text-ssn');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });



            $('.bank-account').on('click', function() {
                var $textEdit = $('.text-bank-account');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.credit-account').on('click', function() {
                var $textEdit = $('.text-credit-account');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.about-us').on('click', function() {
                var $textEdit = $('.text-about-us');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.social-media').on('click', function() {
                var $textEdit = $('.text-social-media');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.jhon-smith-2').on('click', function() {
                var $textEdit = $('.text-john-smith');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.john-public').on('click', function() {
                var $textEdit = $('.text-john-public');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.the-owner').on('click', function() {
                var $textEdit = $('.text-the-owner');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.john-smith-1').on('click', function() {
                var $textEdit = $('.text-john-smith-1');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.history').on('click', function() {
                var $textEdit = $('.text-history');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.ethics-1').on('click', function() {
                var $textEdit = $('.text-ethics');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

            $('.philosophy').on('click', function() {
                var $textEdit = $('.text-philosophy');
                if ($textEdit.prop('disabled')) {
                    $textEdit.prop('disabled', false).focus();
                    var val = $textEdit.val();
                    $textEdit.val('').val(val);
                } else {
                    $textEdit.prop('disabled', true);
                }
            });

        });
    </script>
@endsection
