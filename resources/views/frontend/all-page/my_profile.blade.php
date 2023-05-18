@extends('frontend.layouts.app')
@section('content')
<div class="inner-content">
    <div class="section-product-charter">
        <div class="container">
            <div class="row col-lg-9 mx-auto gx-5">
            <div class="col-12 col-md-5 gx-0 gx-md-1 gx-lg-5 px-lg-3">
                @include('frontend.include.sidebar')
            </div>
            <div class="col-12 col-md-7 gx-0 gx-md-1 gx-lg-5 px-lg-3">
                @if (\Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                    <form action="{{route('save_profile_detail')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-account-section">
                            <h2>Profile Mangement</h2>
                            <div class="row gx-lg-5">
                                <div class="col-12 col-md-5 col-lg-4">
                                    <div class="my-account-image">
                                        <div class="account-image">
                                            <img id="preview-image-before-upload" src="{{@$userDetail->user_profile_image}}" alt="preview image" style="max-height: 250px;" onerror="this.src='{{ asset('images/users.jfif') }}'">
                                        </div>
                                        <input type="file" class="inputfile form-control" name="user_profile_image" id="user_profile_image">
                                        <div class="upload-logo"><i class="fa fa-cloud-upload" aria-hidden="true"></i></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-8">
                                    <div class="mb-3">
                                        <label for="nameInputEmail1" class="form-label mb-0">Name</label>
                                        <input type="text" class="form-control" value="{{@$userDetail->name}}" name="name" id="nameInputEmail1" aria-describedby="nameHelp">
                                        <div class="pincel"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputtagline" class="form-label mb-0">Birthday</label>
                                        <input type="date" class="form-control about-me" id="exampleInputtagline" name="date_of_birth" value="{{@$userDetail->date_of_birth}}">
                                        <div class="pincel"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- <form> -->
                                    <div class="mb-3">
                                        <label for="exampleInputtagline" class="form-label mb-0">About Me</label>
                                        <div class="about-me border rounded pincel">
                                            <input type="text" class="form-control" name="about_me" id="about_me" value="{{@$userDetail->about_me}}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nameInputEmail1" class="form-label mb-0">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{@$user->email}}" id="nameInputEmail1" aria-describedby="nameHelp">
                                        <div class="pincel"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputtagline" class="form-label mb-0">Phone</label>
                                        <input type="text" class="form-control about-me" value="{{@$userDetail->phone}}" name="phone" id="exampleInputtagline">
                                        <div class="pincel"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Adress</label>
                                        <input type="text" name="address" value="{{@$userDetail->address}}" class="form-control">
                                        <div class="pincel"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Country</label>
                                        <select class="form-select" class="form-control" name="country_id" id="country_id">
                                            @foreach ($countries as $country)
                                            <option value="{{$country->id}}" {{ (isset($userDetail)) ? $country->id == $userDetail->country_id ? 'selected' : '' : '' }}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row gx-2 mb-0 mb-md-3">
                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                            <label for="">State</label>
                                            <select id="state-id" class="form-control" name="state_id">
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                            <label for="" class="form-label mb-0">Zip Code</label>
                                            <input type="text" class="form-control mt-2" name="zip_code" value="{{@$user->zip_code}}">
                                            <div class="pincel"></div>
                                        </div>
                                    </div>
                                    <div class="row gx-2 mb-0 mb-md-3">
                                        <div class="col-12 col-md-12 mb-3 mb-md-0">
                                            <label for="" class="form-label mb-0">City</label>
                                            <select id="city-id" class="form-control" name="city_id">
                                            </select>
                                            <div class="pincel"></div>
                                        </div>

                                    </div>

                                    <div class="row gx-4 mb-0 mb-md-5 align-items-end">
                                        <div class="col-12 col-md-8 mb-3 mb-md-0">
                                            <label for="">Language Spoken</label>
                                            <select class="form-select" name="language">
                                                <option></option>
                                                <option value="english" {{ ("english" == @$userDetail->language) ? 'selected' : '' }}>English</option>
                                                <option value="spanish" {{ ("spanish" == @$userDetail->language) ? 'selected' : '' }}>Spanish</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3 mb-md-0">
                                            <!-- <button class="btn btn-primary add-more-width" type="button"><span><i class="fa fa-plus me-2" aria-hidden="true"></i></span>Add More</button> -->
                                        </div>
                                    </div>
                                    <!-- 'userProfessions','userEducations','userCertificates','userProfessions'] -->
                                    <h4 class="mb-1">Professional Experience</h4>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Business Name</label>
                                        <input type="text" name="business_name" value="{{@$userProfessions->business_name}}" class="form-control">
                                        <div class="pincel"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="book_from">From</label>
                                            <div class="input-icon">
                                                <input type="date" class="business_from form-control" name="business_from" value="{{@$userProfessions->business_from}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="business_to">To</label>
                                            <div class="input-icon"><input type="date" class="business_to form-control" name="business_to" value="{{@$userProfessions->business_to}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label mb-0">Description</label>
                                        <input type="text" class="form-control" name="business_description" value="{{@$userProfessions->business_description}}">
                                        <div class="pincel"></div>
                                    </div>
                                
                                    <div class=" d-md-flex justify-content-md-start mb-3 mb-md-5">
                                        <!-- <button class="btn btn-primary" type="button"><span>
                                                <i class="fa fa-plus me-2" aria-hidden="true"></i></span>Add More</button> -->
                                    </div>
                                    <h4 class="mb-2">Education Details </h4>
                                     <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="text">Name Of Collage</label>
                                            <div class="input-icon"><input type="text" name="college_name" value="{{@$userEducations->college_name}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="text">Degree</label>
                                            <div class="input-icon"><input type="text" name="degree" value="{{@$userEducations->degree}}" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class=" d-md-flex justify-content-md-start mb-3 mb-md-5">
                                        <!-- <button class="btn btn-primary" type="button"><span>
                                                <i class="fa fa-plus me-2" aria-hidden="true"></i></span>Add More</button> -->
                                    </div>
                                    <h4 class="mb-2">Certificates </h4>
    
                                    <div class="row">
                                            <div class="col-6 mb-3">
                                                <label for="text">Course Name</label>
                                                <div class="input-icon">
                                                    <input type="text" name="course_name" value="{{@$userCertificates->course_name}}" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="text">Upload Certificates</label>
                                                <label class="uploadFile border rounded">
                                                    <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i>
                                                    <span class="filename">Upload </span>
                                                    <!-- <img id="preview-image-before-upload" src="{{ uploaded_asset(@$user->course_document_img)}}"  alt="preview image" style="max-height: 250px;"> -->
                                                    <input type="file" class="inputfile form-control" name="course_certification_document" required>
                                                </label>
                                            </div>
                                        </div>
                                </div>
                                <div class=" d-md-flex justify-content-md-end mb-3 mb-md-4">
                                    <!-- <button class="btn btn-primary" type="button"><span>
                                            <i class="fa fa-plus me-2" aria-hidden="true"></i></span>Add More</button> -->
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label mb-0">Portfolio</label>
                                    <input type="text" class="form-control" name="portfolio_name" value="{{@$userDetail->portfolio_name}}">
                                </div>
                                <input type="hidden" name="user_id" value="{{@$user->id}}">
                                <div class="mb-3">
                                    <label for="" class="form-label mb-0">Links</label>
                                    <input type="text" class="form-control" name="portfolio_link" value="{{@$userDetail->portfolio_link}}">
                                </div>
                                <div class="d-md-flex justify-content-md-end mb-3 mb-md-4">
                                    <!-- <button class="btn btn-primary" type="button"><span>
                                            <i class="fa fa-plus me-2" aria-hidden="true"></i></span>Add More</button> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="nameInputEmail1" class="form-label mb-0">Social Media Link</label>
                                            <input type="name" class="form-control " id="nameInputEmail1" aria-describedby="nameHelp">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="nameInputEmail1" class="form-label mb-0">Social Media Link</label>
                                            <input type="name" class="form-control " id="nameInputEmail1" aria-describedby="nameHelp">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="nameInputEmail1" class="form-label mb-0">Social Media Link</label>
                                            <input type="name" class="form-control " id="nameInputEmail1" aria-describedby="nameHelp">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="nameInputEmail1" class="form-label mb-0">Social Media Link</label>
                                            <input type="name" class="form-control " id="nameInputEmail1" aria-describedby="nameHelp">
                                        </div>
                                    </div>
                         </div> -->
                        <button class="btn  btn-primary">Cancel</button>
                        <button class="btn  btn-primary" type="submit">Save Changes</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    //   $(document).ready(function (e) {
    const dateControl = document.querySelector('input[type="date"]');
    dateControl.value = `{{ date('Y-m-d',strtotime(@$userDetail->date_of_birth)) }}`;
    dateControl.value = `{{ date('Y-m-d',strtotime(@$userProfessions->business_from)) }}`;
    dateControl.value = `{{ date('Y-m-d',strtotime(@$userProfessions->business_to)) }}`;

    $('#user_profile_image').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

    //   });

    $(document).ready(function() {
        var country_id = `{{ @$userDetail->country_id }}`;
        var state_id = `{{ @$userDetail->state_id }}`;
        var city_id = `{{ @$userDetail->city_id }}`;
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