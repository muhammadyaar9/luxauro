@extends('frontend.vendor.layouts.app')
@section('title')
    <title>Vendor Account Form </title>
@endsection
@section('content')
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Vendor Account Request </h5>
                <div class="card-body">
                    <form
                        action="{{ isset($allreadyexistdata) ? route('accountRequestupdate') : route('accountRequeststore') }} "
                        enctype="multipart/form-data" method="post">
                        @csrf
                        @if (isset($allreadyexistdata))
                            <input type="hidden" value="{{ $allreadyexistdata->id }}" name="id">
                        @endif
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Business Name</label>
                                    <input type="name" class="form-control @error('title') is-invalid @enderror"
                                        name="name" placeholder="Business Name" title="Business Name" title="name"
                                        value="{{ isset($allreadyexistdata) ? $allreadyexistdata->name : old('name') }}" />
                                    @error('name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Upload Business Logo </label>
                                    <input type="file" title="Upload Business Logo"
                                        class="form-control @error('business_logo') is-invalid @enderror"
                                        name="business_logo" value="{{ old('business_logo') }}" />
                                    @error('business_logo')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Upload Your Store
                                        Header</label>
                                    <input type="file" title="Upload Your Store Header"
                                        class="form-control @error('upload_your_store_header') is-invalid @enderror"
                                        name="upload_your_store_header" value="{{ old('upload_your_store_header') }}" />
                                    @error('upload_your_store_header')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Business Adress</label>
                                    <input type="text" title="Business Adress"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ isset($allreadyexistdata->address) ? $allreadyexistdata->address : old('address') }}"
                                        placeholder="Business Adress" />
                                    @error('address')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- country state city --}}
                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <label>Country <span class="text-danger"><b></b></span></label>
                                <select name="country_id" class="form-select select2" required id="country-dd">
                                    <option value="">- Select -</option>
                                    @foreach ($countries as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <label>State <span class="text-danger"><b></b></span></label>
                                <select name="state_id" class="form-control select2" id="state-dd" required>

                                </select>
                                @error('state_id')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mb-3">
                                <label>City <span class="text-danger"><b></b></span></label>
                                <select name="city" class="form-control select2" id="city-dd" required>

                                </select>
                                @error('city')
                                    <div class="error">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> Business Email </label>
                                    <input type="email" title="Business Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ isset($allreadyexistdata->email) ? $allreadyexistdata->email : old('email') }}"
                                        placeholder="Business Email" />
                                    @error('email')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> Business Website </label>
                                    <input type="text" title="Business Website"
                                        class="form-control @error('business_website') is-invalid @enderror"
                                        name="business_website"
                                        value="{{ isset($allreadyexistdata->business_website) ? $allreadyexistdata->business_website : old('business_website') }}"
                                        placeholder="Business Website" />
                                    @error('business_website')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> Business Phone </label>
                                    <input type="text" title="Business Phone"
                                        class="form-control @error('business_phone') is-invalid @enderror"
                                        name="business_phone"
                                        value="{{ isset($allreadyexistdata) ? $allreadyexistdata->business_phone : old('business_phone') }}"
                                        placeholder="XXX-XXX-XXX" />
                                    @error('business_phone')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> EIN </label>
                                    <input type="text" title="EIN"
                                        class="form-control @error('ein') is-invalid @enderror" name="ein"
                                        value="{{ isset($allreadyexistdata) ? $allreadyexistdata->ein : old('ein') }}"
                                        placeholder="XXX-XXXXXX" />
                                    @error('ein')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> Bank Account Number </label>
                                    <input type="text" title="EIN"
                                        class="form-control @error('bank_account_number') is-invalid @enderror"
                                        name="bank_account_number"
                                        value="{{ isset($allreadyexistdata) ? $allreadyexistdata->bank_account_number : old('bank_account_number') }}"
                                        placeholder="XXX-XXXXXX" />
                                    @error('bank_account_number')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> Credit Card Number </label>
                                    <input type="text" title="Credit Card Number"
                                        class="form-control @error('credit_card_number') is-invalid @enderror"
                                        name="credit_card_number"
                                        value="{{ isset($allreadyexistdata) ? $allreadyexistdata->credit_card_number : old('credit_card_number') }}"
                                        placeholder="XXXx-XXXX" />
                                    @error('credit_card_number')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> Description / About Us
                                    </label>
                                    <textarea name="description" placeholder="Description / About Us"
                                        class="form-control @error('credit_card_number') is-invalid @enderror">{{ isset($allreadyexistdata) ? $allreadyexistdata->description : old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> What kind of business do you
                                        run? </label>
                                    <select name="kind_of_business" id="" class="form-control">
                                        <option value="">-Select-</option>
                                        <option value="Business 1"
                                            {{ old('kind_of_business') == 'Business 1' ? 'selected' : '' }}@isset($allreadyexistdata)@if ($allreadyexistdata->kind_of_business == 'Business 1') selected @endif @endisset>Business 1
                                        </option>
                                        <option value="Business 2"
                                            {{ old('kind_of_business') == 'Business 2' ? 'selected' : '' }}
                                            @isset($allreadyexistdata)@if ($allreadyexistdata->kind_of_business == 'Business 2') selected @endif @endisset>
                                            Business 2
                                        </option>
                                    </select>
                                    @error('kind_of_business')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> Where do you offer to
                                        deliver your product? </label>
                                    <select name="delivery_id" id=""
                                        class="form-control @error('delivery_id') is-invalid @enderror ">
                                        <option value="">-Select-</option>
                                        @foreach ($delivoryoptions as $delivoryoption)
                                            <option value="{{ $delivoryoption->id }}"
                                                {{ old('delivery_id') == $delivoryoption->id ? 'selected' : '' }} @isset($allreadyexistdata)@if ($allreadyexistdata->delivery_id == $delivoryoption->id) selected @endif @endisset >
                                                {{ $delivoryoption->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('delivery_id')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Social Media Link
                                    </label>
                                    <input type="text" name="social_media_link"
                                        value="{{ isset($allreadyexistdata) ? $allreadyexistdata->social_media_link : old('social_media_link') }}" placeholder="Social Media Link"
                                        class="form-control @error('social_media_link') is-invalid @enderror"
                                        title="Social Media Link">
                                    @error('social_media_link')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Owner Name
                                    </label>
                                    <input type="text" name="owner_name"
                                        class="form-control @error('owner_name') is-invalid @enderror"
                                        value="{{ isset($allreadyexistdata) ? $allreadyexistdata->owner_name  : old('owner_name') }}" placeholder="Owner Name" title="Owner Name">
                                    @error('owner_name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Owner Image
                                    </label>
                                    <input type="file" name="owner_image"
                                        class="form-control @error('owner_image') is-invalid @enderror"
                                        value="{{ old('owner_image') }}" placeholder="Social Media Link"
                                        title="Social Media Link">
                                    @error('owner_image')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label"> History
                                    </label>
                                    <textarea name="history" placeholder="History" class="form-control @error('history') is-invalid @enderror">{{  isset($allreadyexistdata) ? $allreadyexistdata->history : old('history') }}</textarea>
                                    @error('history')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Ethic
                                    </label>
                                    <textarea name="ethic" placeholder="Ethic" class="form-control @error('ethic') is-invalid @enderror">{{   isset($allreadyexistdata) ? $allreadyexistdata->ethic :  old('ethic') }}</textarea>
                                    @error('ethic')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Philosophy
                                    </label>
                                    <textarea name="philosophy" placeholder="Philosophy" class="form-control @error('philosophy') is-invalid @enderror">{{  isset($allreadyexistdata) ? $allreadyexistdata->philosophy : old('philosophy') }}</textarea>
                                    @error('philosophy')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="" class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit"> {{ isset($allreadyexistdata) ? 'Update' : 'Submit' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
