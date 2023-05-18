@extends('frontend.layouts.app')
@section('title')
    <title>project Create</title>
@endsection
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <div class="inner-content">
        <div class="section-product-charter">
            <div class="container">
                <div class="row col-lg-9 mx-auto gx-5">
                    <div class="col-12 col-md-5 gx-0 gx-md-1 gx-lg-5 px-lg-3">
                        @include('frontend.include.sidebar')
                    </div>
                    <div class="col-12 col-md-7 gx-0 gx-md-1 gx-lg-5 px-lg-5">
                        <div class="my-account-section">
                            <h2 class="mb-2 setup-merchant-heading d-block">Edit New Goldevine Project <span
                                    class="appendata">(1/2)</span></h2>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active me-3" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true" onclick="projectDetail()">Project
                                        Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false"
                                        onclick="founderDetails()">Fouder Details</button>
                                </li>
                            </ul>
                            <form action="{{ route('updateProject') }}" enctype="multipart/form-data"
                                method="post" id="formSubmit">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div class="my-account-section business-information">
                                            <div class="mb-3">
                                                <label for="" class="form-label mb-0">Project Title</label>
                                                <input type="text"
                                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                                    value="{{ $project->title }}">
                                                <div class="pincel"></div>
                                                @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="text-area">
                                                <label for="exampleInputPassword1">Project Description</label>
                                                <textarea class="form-control mb-4 @error('description')  is-invalid @enderror" placeholder=""
                                                    id="exampleFormControlTextarea1" rows="3" name="description" class="description">{!! $project->description !!}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label mb-0">Project Short
                                                    Description</label>
                                                <input type="text"
                                                    class="form-control @error('shoert_description_project') is-invalid @enderror"
                                                    name="shoert_description_project"
                                                    value="{{ $project->short_description }}">
                                                <div class="pincel"></div>
                                                @error('shoert_description_project')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="select-products">Project Category</label>
                                                <select class="form-select mb-3 @error('project_category')
                                                is-invalid @enderror" aria-label="Default select example"
                                                    id="select-products" name="project_category">
                                                    <option selected value="">-Select-</option>
                                                    <option value="1" {{ $project->project_category == '1' ? 'selected' : '' }} >One</option>
                                                    <option value="2" {{ $project->project_category == '2' ? 'selected' : '' }} >Two</option>
                                                    <option value="3" {{ $project->project_category == '3' ? 'selected' : '' }} >Three</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="city_tag">Tags</label>
                                                <input type="text"
                                                    class="form-control @error('tags')  is-invalid @enderror" id="city_tag"
                                                    name="tags" data-role="tagsinput"
                                                    value="@foreach ($project->tags as $tag) {{ $tag }} @endforeach">
                                                @error('tags')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label>Feature Image</label>
                                                <label class="uploadFile border rounded">
                                                    <i class="fa fa-cloud-upload upload-icon-account-1"
                                                        aria-hidden="true"></i>
                                                    <span class="filename">file</span>
                                                    <input type="file"
                                                        class="inputfile form-control @error('feature_image_project')
                                                    is-invalid @enderror"
                                                        name="feature_image_project">
                                                    @error('feature_image_project')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </label>
                                            </div>
                                            <div class="mb-3">
                                                <label>Gallery Image</label>
                                                <label class="uploadFile border rounded">
                                                    <i class="fa fa-cloud-upload upload-icon-account-1"
                                                        aria-hidden="true"></i>
                                                    <span class="filename">file</span>
                                                    <input type="file"
                                                        class="inputfile form-control @error('gallery_image')
                                                    is-invalid @enderror "
                                                        name="gallery_image[]" multiple>
                                                    @error('gallery_image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </label>

                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label mb-0">Project Promo Video</label>
                                                <input type="text"
                                                    class="form-control @error('video_link')
                                                is-invalid @enderror"
                                                    placeholder="https://" name="video_link"
                                                    value="{{ $project->video_link }}">
                                                <div class="pincel"></div>
                                                @error('video_link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="select-products">Project End Method</label>
                                                <select
                                                    class="form-select mb-3 @error('project_end_method')
                                                is-invalid @enderror"
                                                    aria-label="Default select example" id="select-products"
                                                    name="project_end_method">
                                                    <option value="" selected>-Select-</option>
                                                    <option
                                                        value="Target Goal"{{ $project->project_end_method == 'Target Goal' ? 'selected' : '' }}>
                                                        Target Goal</option>
                                                    <option value="Target Date"
                                                        {{ $project->project_end_method == 'Target Date' ? 'selected' : '' }}>
                                                        Target Date</option>
                                                    <option value="Target Goal & Date"
                                                        {{ $project->project_end_method == 'Target Goal & Date' ? 'selected' : '' }}>
                                                        Target Goal & Date</option>
                                                    <option value="Campaign Never Ends"
                                                        {{ $project->project_end_method == 'Campaign Never Ends' ? 'selected' : '' }}>
                                                        Campaign Never Ends</option>
                                                    <option value="Featured"
                                                        {{ $project->project_end_method == 'Featured' ? 'selected' : '' }}>
                                                        Featured</option>
                                                </select>
                                                @error('project_category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row gx-5 mb-0 mb-md-3">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <label for="" class="form-label mb-0">Project Start
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control @error('start_date')
                                                    is-invalid @enderror"
                                                        name="start_date" value="{{ $project->start_date }}">
                                                    @error('start_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <label for="" class="form-label mb-0">Project End Date</label>
                                                    <input type="date"
                                                        class="form-control @error('end_date')
                                                    is-invalid @enderror"
                                                        name="end_date" value="{{ $project->end_date }}">
                                                    @error('end_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="row gx-5 mb-0 mb-md-3">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <label for="" class="form-label mb-0">Minimum Pledge
                                                        Amount</label>
                                                    <input type="number"
                                                        class="form-control @error('minimum_amount')
                                                    is-invalid @enderror"
                                                        name="minimum_amount"
                                                        value="{{ $project->minimum_pledge_amount }}">
                                                    <div class="pincel"></div>

                                                    @error('minimum_amount')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <label for="" class="form-label mb-0">Maximum Pledge
                                                        Amount</label>
                                                    <input type="number"
                                                        class="form-control @error('maximum_amount')
                                                    is-invalid @enderror"
                                                        name="maximum_amount"
                                                        value="{{ $project->maximum_pledge_amount }}">
                                                    <div class="pincel"></div>

                                                    @error('maximum_amount')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="row gx-5 mb-0 mb-md-3">
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <label for="" class="form-label mb-0">Project Funding
                                                        Goal</label>
                                                    <input type="number"
                                                        class="form-control @error('funding_goal')
                                                    is-invalid @enderror"
                                                        name="funding_goal" value="{{ $project->project_funding_goal }}">
                                                    <div class="pincel"></div>

                                                    @error('funding_goal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                                <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                    <label for="" class="form-label mb-0">Recommended Pledge
                                                        Amount</label>
                                                    <input type="number"
                                                        class="form-control @error('recommended_amount')
                                                    is-invalid @enderror"
                                                        name="recommended_amount"
                                                        value="{{ $project->recommended_pledge_amount }}">
                                                    <div class="pincel"></div>

                                                    @error('recommended_amount')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Country</label>
                                                <select
                                                    class="form-select js-example-basic-single @error('country')
                                                is-invalid @enderror"
                                                    name="country">
                                                    <option selected value="">-Select-</option>
                                                    @foreach ($countries as $country)
                                                        <option
                                                            value="{{ $country->name }}"{{ $project->country == $country->name ? 'selected' : '' }}>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label mb-0">Location</label>
                                                <input type="text"
                                                    class="form-control @error('location') is-invalid @enderror"
                                                    name="location" value="{{ $project->location }}">
                                                <div class="pincel"></div>
                                                @error('location')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <strong>Benefits</strong>
                                            @foreach ($project->projectBenefits as $key => $benefit)
                                                @if ($key == 0)
                                                    <div class="row gx-5 mb-0 mb-md-3 mt-2">
                                                        <input type="hidden" name="benefit_id[]" value="{{ $benefit->id }}">
                                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                            <label for="" class="form-label mb-0">Benefit
                                                                Title</label>
                                                            <input type="text" class="form-control"
                                                                name="benefit_title[]"
                                                                value="{{ $benefit->benefit_name }}">
                                                        </div>

                                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                            <label for="" class="form-label mb-0">Benefit
                                                                Price</label>
                                                            <input type="number" class="form-control"
                                                                name="benefit_price[]" value="{{ $benefit->price }}">
                                                        </div>

                                                    </div>
                                                    <div class="row gx-5 mb-0 mb-md-3 mt-2">
                                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                            <label for="" class="form-label mb-0">Benefit
                                                                MSRP</label>
                                                            <input type="text" class="form-control"
                                                                name="benefit_msrp[]"
                                                                value="{{ $benefit->benefit_msrp }}">
                                                            <div class="pincel"></div>
                                                        </div>

                                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                            <label>Feature Image <span class="text-danger">*</span> </label>
                                                            <label class="uploadFile border rounded">
                                                                <i class="fa fa-cloud-upload upload-icon-account-1"
                                                                    aria-hidden="true"></i>
                                                                <span class="filename">file</span>
                                                                <input type="file" class="inputfile form-control"
                                                                    name="feature_image[]" required>
                                                            </label>

                                                        </div>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label mb-0">Benefit Short
                                                            Description</label>
                                                        <input type="text" class="form-control"
                                                            name="short_description[]"
                                                            value="{{ $benefit->short_description }}">
                                                        <div class="pincel"></div>
                                                    </div>
                                                    <div class="row gx-5 mb-0 mb-md-3">
                                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                            <label for="" class="form-label mb-0">Estimated
                                                                Delivery
                                                                Date</label>
                                                            <input type="date" class="form-control"
                                                                name="delivery_date[]"
                                                                value="{{ isset($benefit->estimated_delivery_date) ? $benefit->estimated_delivery_date->format('Y-m-d') : '' }}">
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                            <label for="" class="form-label mb-0">Quantity</label>
                                                            <input type="number" class="form-control" name="quantity[]"
                                                                value="{{ $benefit->quantity }}">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="removerow{{ $key }}">
                                                        <input type="hidden" name="benefit_id[]" value="{{ $benefit->id }}">
                                                        <hr class="y-2">
                                                        <div class="row gx-5 mb-0 mb-md-3 mt-2">
                                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                                <label for="" class="form-label mb-0">Benefit
                                                                    Title</label>
                                                                <input type="text" class="form-control"
                                                                    name="benefit_title[]"
                                                                    value="{{ $benefit->benefit_name }}">
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                                <label for="" class="form-label mb-0">Benefit
                                                                    Price</label>
                                                                <input type="number" class="form-control"
                                                                    name="benefit_price[]" value="{{ $benefit->price }}">
                                                            </div>

                                                        </div>
                                                        <div class="row gx-5 mb-0 mb-md-3 mt-2">
                                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                                <label for="" class="form-label mb-0">Benefit
                                                                    MSRP</label>
                                                                <input type="text" class="form-control"
                                                                    name="benefit_msrp[]"
                                                                    value="{{ $benefit->benefit_msrp }}">
                                                                <div class="pincel"></div>
                                                            </div>

                                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                                <label>Feature Image <span class="text-danger">*</span></label>
                                                                <label class="uploadFile border rounded">
                                                                    <i class="fa fa-cloud-upload upload-icon-account-1"
                                                                        aria-hidden="true"></i>
                                                                    <span class="filename">file</span>
                                                                    <input type="file" class="inputfile form-control"
                                                                        name="feature_image[]" required>
                                                                </label>

                                                            </div>

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label mb-0">Benefit Short
                                                                Description</label>
                                                            <input type="text" class="form-control"
                                                                name="short_description[]"
                                                                value="{{ $benefit->short_description }}">
                                                            <div class="pincel"></div>
                                                        </div>
                                                        <div class="row gx-5 mb-0 mb-md-3">
                                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                                <label for="" class="form-label mb-0">Estimated
                                                                    Delivery
                                                                    Date</label>
                                                                <input type="date" class="form-control"
                                                                    name="delivery_date[]"
                                                                    value="{{ isset($benefit->estimated_delivery_date) ? $benefit->estimated_delivery_date->format('Y-m-d') : '' }}">
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                                <label for=""
                                                                    class="form-label mb-0">Quantity</label>
                                                                <input type="number" class="form-control"
                                                                    name="quantity[]" value="{{ $benefit->quantity }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-8"></div>
                                                            <div class="col-4">
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="removerow({{ $key }})"> -
                                                                    Remove a Benefit</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <hr class="m-3">

                                            <div class="addbenefitappend">

                                            </div>

                                            <div class="d-lg-block mb-3">
                                                <button class="btn btn-primary my-2" type="button"
                                                    onclick="addNewBenefit()"><span><i class="fa fa-plus me-2"
                                                            aria-hidden="true"></i></span>Add a
                                                    Benefit</button>
                                            </div>
                                            <a href="{{ route('home') }}"
                                                class="btn btn-primary text-uppercase p-2 text-white">Cancel</a>
                                            <button class="btn btn-primary text-uppercase" onclick="nextbtn()"
                                                type="button">Next</button>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <input type="hidden" name="founder_id" value="{{  $project->FounderDetail->id }}">
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Business Address</label>
                                            <input type="text"
                                                class="form-control @error('business_address')
                                            is-invalid @enderror"
                                                name="business_address"
                                                value="{{ $project->FounderDetail->business_address }}">
                                            <div class="pincel"></div>
                                            @error('business_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="row gx-2 mb-0 mb-md-3">
                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">City</label>
                                                <input type="text"
                                                    class="form-control @error('city')
                                                is-invalid @enderror"
                                                    name="city" value="{{ $project->FounderDetail->city }}">
                                                <div class="pincel"></div>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-3 mb-3 mb-md-0">
                                                <label for="select-products">State</label>
                                                <input type="text" name="founder_state" class="form-control @error('founder_state')
                                                is-invalid @enderror" value="{{ $project->FounderDetail->founder_state }}">
                                                @error('founder_state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror



                                                @error('business_category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            <div class="col-12 col-md-3 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">Zip Code</label>
                                                <input type="text"
                                                    class="form-control @error('zip_code')
                                                is-invalid @enderror"
                                                    value="{{ $project->FounderDetail->zip_code }}" name="zip_code">
                                                <div class="pincel"></div>
                                                @error('zip_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Email</label>
                                            <input type="email"
                                                class="form-control  @error('email')
                                            is-invalid @enderror"
                                                value="{{ $project->FounderDetail->email }}" name="email">
                                            <div class="pincel"></div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-outline mb-3">
                                                <label for="" class="form-label mb-0">Website <span
                                                        class="optional">(Optional) </span></label>
                                                <input type="text" class="form-control" name="website"
                                                    value="{{ $project->FounderDetail->website }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Phone</label>
                                            <input type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="xxx-xxx-xxxx" name="phone"
                                                value="{{ $project->FounderDetail->phone }}">
                                            <div class="pincel"></div>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row gx-3 mb-0 mb-md-3">
                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">EIN / TIN</label>
                                                <input type="text"
                                                    class="form-control @error('ein') is-invalid @enderror"
                                                    placeholder="xx-xxxxxxx" name="ein"
                                                    value="{{ $project->FounderDetail->ein }}">
                                                <div class="pincel"></div>
                                                @error('ein')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                <label for="" class="form-label mb-0">Deposit Bank Account</label>
                                                <input type="text"
                                                    class="form-control @error('bank_account') is-invalid @enderror"
                                                    name="bank_account"
                                                    value="{{ $project->FounderDetail->bank_account }}">
                                                <div class="pincel"></div>
                                                @error('bank_account')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label mb-0">Credit Cart Number</label>
                                            <input type="text"
                                                class="form-control @error('cart_number') is-invalid @enderror"
                                                name="cart_number" value="{{ $project->FounderDetail->cart_number }}">
                                            <div class="pincel"></div>
                                            @error('cart_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                        <div class="form-check mb-4">
                                            <input
                                                class="form-check-input @error('term_conditions') is-invalid @enderror "
                                                type="checkbox" id="defaultCheck1" name="term_conditions"
                                                value="1">
                                            <label class="form-check-label pb-0" for="defaultCheck1">
                                                By Clicking Submit, you agree to the <strong>Goldevine term &
                                                    Conditions.</strong>
                                            </label>
                                            @error('term_conditions')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary text-uppercase">Back</button>
                                        <button type="submit" onclick="submitform()"  class="btn btn-primary text-uppercase">submit </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>



    <script>
        function submitform() {
            document.getElementById("formSubmit").submit();
        }
        function addNewBenefit() {
            var tempid = Math.floor(Math.random() * 100000);
            var html = '<div class="benefit' + tempid +
                '"><div class="row gx-5 mb-0 mb-md-3 mt-2"> <div class="col-12 col-md-6 mb-3 mb-md-0"><input type="hidden" name="benefit_id[]"> <label for="" class="form-label mb-0">Benefit Title</label> <input type="text" class="form-control" name="benefit_title[]"> </div><div class="col-12 col-md-6 mb-3 mb-md-0"> <label for="" class="form-label mb-0">Benefit Price</label> <input type="number" class="form-control" name="benefit_price[]"> </div></div><div class="row gx-5 mb-0 mb-md-3 mt-2"> <div class="col-12 col-md-6 mb-3 mb-md-0"> <label for="" class="form-label mb-0">Benefit MSRP</label> <input type="text" class="form-control" name="benefit_msrp[]"> <div class="pincel"></div></div><div class="col-12 col-md-6 mb-3 mb-md-0" > <label>Feature Image <span class="text-danger">*</span></label> <label class="uploadFile border rounded"> <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i> <span class="filename">file</span> <input type="file" class="inputfile form-control" required name="feature_image[]"/> </label> </div></div><div class="mb-3"> <label for="" class="form-label mb-0">Benefit Short Description</label> <input type="text" class="form-control" name="short_description[]"> <div class="pincel"></div></div><div class="row gx-5 mb-0 mb-md-3"> <div class="col-12 col-md-6 mb-3 mb-md-0"> <label for="" class="form-label mb-0">Estimated Delivery Date</label> <input type="date" class="form-control" name="delivery_date[]"> </div><div class="col-12 col-md-6 mb-3 mb-md-0"> <label for="" class="form-label mb-0">Quantity</label> <input type="number" class="form-control" name="quantity[]"> </div></div><div class="row"> <div class="col-8"></div><div class="col-4"> <button class="btn btn-danger" onclick="removebenift(' +
                tempid + ')"> - Remove a Benefit</button></div></div><hr class="m-3"></div>';
            $('.addbenefitappend').append(html);

        }

        function removebenift(id) {
            $('.benefit' + id).remove();
        }

        function nextbtn() {
            $('#pills-profile-tab').addClass('active');
            $('#pills-profile-tab').attr('aria-selected', 'true');
            $('#pills-home-tab').removeClass('active');
            $('#pills-home-tab').attr('aria-selected', 'false');
            $('#pills-home').removeClass('active show');
            $('#pills-profile').addClass('active show');
            $('.appendata').text('(2/2)');

        }

        function projectDetail() {

            $('.appendata').text('(1/2)');
        }

        function founderDetails() {

            $('.appendata').text('(2/2)');
        }

        function removerow(id) {
            $('.removerow' + id).remove();
        }
    </script>
@endsection
