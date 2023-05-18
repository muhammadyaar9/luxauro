@extends('frontend.admin.layouts.app')
@section('title')
    <title>Create Project</title>
@endsection
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Project</h5>
                <div class="card-body">
                    <form action="{{ route('admin-goudevine-project.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="title" class="form-control @error('title') is-invalid @enderror"
                                        name="title" placeholder="Title" title="Title" value="{{ old('title') }}" />
                                    @error('title')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Short Description</label>
                                    <input type="text"
                                        class="form-control @error('short_description_project') is-invalid @enderror"
                                        name="short_description_project" placeholder="Short Description"
                                        title="Short Description" value="{{ old('short_description_project') }}" />
                                    @error('short_description_project')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="select-products">Project Category</label>
                                    <select
                                        class="form-select  @error('project_category')
                                    is-invalid @enderror"
                                        aria-label="Default select example" id="select-products" name="project_category">
                                        <option selected value="">-Select-</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Project End Method</label>
                                    <select name="project_end_method" id=""
                                        class="form-control @error('project_end_method') is-invalid @enderror">
                                        <option value="">-Select-</option>
                                        <option value="Target Goal">Target Goal</option>
                                        <option value="Target Date">Target Date</option>
                                        <option value="Target Goal & Date">Target Goal & Date</option>
                                        <option value="Campaign Never Ends">Campaign Never Ends</option>
                                        <option value="Featured">Featured</option>
                                    </select>
                                    @error('project_end_method')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tags</label>
                                    <input class="form-control  @error('tags') is-invalid @enderror" type="text"
                                        data-role="tagsinput" name="tags" value="{{ old('tags') }}" placeholder="Tags">
                                    @if ($errors->has('tags'))
                                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Feature Image</label>
                                    <input type="file" class="form-control @error('feature_image') is-invalid @enderror"
                                        name="feature_image_project" placeholder="description" title="description"
                                        value="{{ old('feature_image') }}" />
                                    @error('feature_image')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Gallery Image</label>
                                    <input type="file" class="form-control @error('gallery_image') is-invalid @enderror"
                                        name="gallery_image[]" placeholder="Gallery Image" title="Gallery Image"
                                        value="{{ old('gallery_image') }}" multiple />
                                    @error('gallery_image')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Project Promo Video
                                        Link</label>
                                    <input type="link" class="form-control @error('video_link') is-invalid @enderror"
                                        name="video_link" placeholder="https://" title="https://"
                                        value="{{ old('video_link') }}" />
                                    @error('video_link')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Project Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" placeholder="start_date" title="Start Date"
                                        value="{{ old('start_date') }}" />
                                    @error('start_date')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Project End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        name="end_date" placeholder="End Date" title="End Date"
                                        value="{{ old('end_date') }}" />
                                    @error('end_date')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Minimum Pledge Amount</label>
                                    <input type="number"
                                        class="form-control @error('minimum_pledge_amount') is-invalid @enderror"
                                        name="minimum_pledge_amount" placeholder="Minimum Pledge Amount"
                                        title="Minimum Pledge Amount" value="{{ old('minimum_pledge_amount') }}" />
                                    @error('minimum_pledge_amount')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Maximum Pledge Amount</label>
                                    <input type="number"
                                        class="form-control @error('maximum_pledge_amount') is-invalid @enderror"
                                        name="maximum_pledge_amount" placeholder="Maximum Pledge Amount"
                                        title="Maximum Pledge Amount" value="{{ old('maximum_pledge_amount') }}" />
                                    @error('maximum_pledge_amount')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Project Funding Goal</label>
                                    <input type="number"
                                        class="form-control @error('project_funding_goal') is-invalid @enderror"
                                        name="project_funding_goal" placeholder="Project Funding Goal"
                                        title="Project Funding Goal" value="{{ old('project_funding_goal') }}" />
                                    @error('project_funding_goal')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Recommended Pledge
                                        Amount</label>
                                    <input type="number"
                                        class="form-control @error('recommended_pledge_amount') is-invalid @enderror"
                                        name="recommended_pledge_amount" placeholder="Recommended Pledge Amount"
                                        title="Recommended Pledge Amount"
                                        value="{{ old('recommended_pledge_amount') }}" />
                                    @error('recommended_pledge_amount')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        name="location" placeholder="Location" title="Location"
                                        value="{{ old('location') }}" />
                                    @error('location')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                                    <textarea name="description" id=""class="form-control  @error('description') is-invalid @enderror"
                                        name="description" placeholder="description" id="description" title="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <label for="" class="form-lable"> <strong>Benefits</strong></label>
                            <div class="row mt-4">
                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Benefit
                                            Name</label>
                                        <input type="text" class="form-control" name="benefit_name[]"
                                            placeholder="Benefit Name" title="benefit_name" value="" />
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                                        <input type="number" class="form-control" name="price[]" placeholder="Price"
                                            title="Price" />
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Benefit MSRP
                                        </label>
                                        <input type="number" class="form-control" name="benefit_msrp[]"
                                            placeholder="Benefit MSRP" title="benefit_msrp" value="" />
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Feature Image
                                        </label>
                                        <input type="file" class="form-control" name="feature_image[]"
                                            placeholder="Feature Image" title="Feature Image" value="" />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Estimated
                                            Delivery Date
                                        </label>
                                        <input type="date" class="form-control" name="estimated_delivery_date[]"
                                            placeholder="Estimated Delivery Date" title="Estimated Delivery Date"
                                            value="" />
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Quantity
                                        </label>
                                        <input type="number" min="1" class="form-control" name="quantity[]"
                                            placeholder="Quantity" title="Quantity" value="" />
                                    </div>
                                </div>

                                <div class="col-md-10 col-sm-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Benefit Short
                                            Description
                                        </label>
                                        <input type="text" class="form-control" name="short_description[]"
                                            placeholder="Benefit Short Description" title="Benefit Short Description"
                                            value="" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12">
                                    <div class="mb-3 mt-4 pt-2">
                                        <button class="btn btn-outline-primary addbenefit" type="button"> + Add
                                            Benefit
                                        </button>
                                    </div>
                                </div>
                                <hr>
                            </div>


                            <div class="addnewbenefit">

                            </div>

                            <label for="" class="form-lable py-2"> <strong> Fouder Details</strong></label>

                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Business Address
                                    </label>
                                    <input type="text"
                                        class="form-control @error('business_address') is-invalid @enderror"
                                        name="business_address" placeholder="Business Address" title="Business Address"
                                        value="{{ old('business_address') }}" />
                                    @error('business_address')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">City
                                    </label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        name="city" placeholder="City" title="City" value="{{ old('city') }}" />
                                    @error('city')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">State

                                    </label>
                                    <input type="text" class="form-control @error('founder_state') is-invalid @enderror" name="founder_state" value="{{ old('founder_state') }}">
                                    @error('founder_state')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Zip Code
                                    </label>
                                    <input type="number" class="form-control @error('zip_code') is-invalid @enderror"
                                        name="zip_code" placeholder="Zip Code" title="Zip Code"
                                        value="{{ old('zip_code') }}" />
                                    @error('zip_code')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email
                                    </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email" title="Email"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Website
                                    </label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror"
                                        name="website" placeholder="Website" title="Website"
                                        value="{{ old('website') }}" />
                                    @error('website')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Phone
                                    </label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" placeholder="Phone" title="Phone"
                                        value="{{ old('phone') }}" />
                                    @error('phone')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">EIN / TIN
                                    </label>
                                    <input type="number" class="form-control @error('ein') is-invalid @enderror"
                                        name="ein" placeholder="EIN / TIN" title="EIN / TIN"
                                        value="{{ old('ein') }}" />
                                    @error('ein')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Deposit Bank Account
                                    </label>
                                    <input type="number"
                                        class="form-control @error('deposit_bank_account') is-invalid @enderror"
                                        name="deposit_bank_account" placeholder="Deposit Bank Account"
                                        title="Deposit Bank Account" value="{{ old('deposit_bank_account') }}" />
                                    @error('deposit_bank_account')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Credit Cart Number
                                    </label>
                                    <input type="number"
                                        class="form-control @error('credit_cart_number') is-invalid @enderror"
                                        name="credit_cart_number" placeholder="Credit Cart Number Account"
                                        title="Credit Cart Number" value="{{ old('credit_cart_number') }}" />
                                    @error('credit_cart_number')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>





                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('admin-goudevine-project.index') }}"
                                        class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit"
                                        onclick="this.form.submit();this.disabled=true;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        rel="stylesheet" />

    <script>
        $(document).ready(function() {
            $('.addbenefit').click(function(e) {
                e.preventDefault();
                var id = Math.floor(Math.random() * 90000) + 10000;
                var html = '';
                html = '<div class="row mt-4" id="addnewbenefits' + id +
                    '"> <div class="col-md-4 col-sm-12"> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Benefit Name</label> <input type="text" class="form-control" name="benefit_name[]" placeholder="Benefit Name" title="benefit_name" value=""/> </div></div><div class="col-md-4 col-sm-12"> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Price</label> <input type="number" class="form-control" name="price[]" placeholder="Price" title="Price" value=""/> </div></div><div class="col-md-4 col-sm-12"> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Benefit MSRP </label> <input type="number" class="form-control" name="benefit_msrp[]" placeholder="Benefit MSRP" title="benefit_msrp" value=""/> </div></div><div class="col-md-4 col-sm-12"> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Feature Image </label> <input type="file" class="form-control" name="feature_image[]" placeholder="Feature Image" title="Feature Image" value=""/> </div></div><div class="col-md-4 col-sm-12"> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Estimated Delivery Date </label> <input type="date" class="form-control" name="estimated_delivery_date[]" placeholder="Estimated Delivery Date" title="Estimated Delivery Date" value=""/> </div></div><div class="col-md-4 col-sm-12"> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Quantity </label> <input type="number" min="1" class="form-control" name="quantity[]" placeholder="Quantity" title="Quantity" value=""/> </div></div><div class="col-md-10 col-sm-12"> <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Benefit Short Description </label> <input type="test" class="form-control" name="short_description[]" placeholder="Benefit Short Description" title="Benefit Short Description" value=""/> </div></div><div class="col-md-2 col-sm-12"> <div class="mb-3 mt-4 pt-2"> <button class="btn btn-outline-danger" type="button" onclick="generateId(' +
                    id + ')">- Remove Benefit</button> </div></div><hr></div>';
                $('.addnewbenefit').append(html);

            });
        });

        function generateId(id) {
            $('#addnewbenefits' + id).remove();
        }
    </script>
@endsection
