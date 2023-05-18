@extends('frontend.layouts.app')

@section('title')
    <title>Charter Managment</title>
@endsection

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />

    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }

        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
    <div class="section-product-charter">
        <div>
            <div class="row col-lg-12 mx-auto gx-5">
                <div class="col-12 col-md-4 gx-0 gx-md-5">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-12 col-md-8 gx-0 gx-md-5 pt-3">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active me-3" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="true">Charter Management</button>
                            <span class="mb-0 text-secondary text-font">You are offering something for rent</span>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                                type="button" role="tab" aria-controls="pills-home" aria-selected="false">Upload
                                Charter</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form action="{{ route('charter_manage') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row gx-2">
                                    <div class="col-12 col-md-12">
                                        <label for="exampleInputEmail1">Charter Name</label>
                                        <input type="text"
                                            class="form-control mb-3 p-2 @error('charter_name') is-invalid @enderror"
                                            id="exampleInputEmail1" name="charter_name" aria-describedby="emailHelp">
                                        @error('charter_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gx-2">
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputEmail1">Charter Type</label>
                                        <select class="form-select mb-3 py-2" aria-label="Default select example"
                                            name="charter_type" id="select-products">
                                            <option value="" selected>-Select-</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputPassword1">Rate</label>
                                        <div class="row gx-2">
                                            <div class="col-12 col-md-6">
                                                <div class="input-group flex-nowrap mb-3">
                                                    <span class="input-group-text" id="addon-wrapping">$</span>
                                                    <input type="number"
                                                        class="form-control custom-input py-2 @error('rate') is-invalid @enderror"
                                                        name="rate" aria-label="Username"
                                                        aria-describedby="addon-wrapping">
                                                    @error('rate')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <select
                                                    class="form-select mb-3 py-2 @error('hr_select') is-invalid @enderror"
                                                    aria-label="Default select example" id="select-products"
                                                    name="hr_select">
                                                    <option value=""selected>-Select-</option>
                                                    <option value="HR">HR</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                                @error('hr_select')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-area mb-3">
                                        <label for="exampleInputPassword1">Charter Description</label>
                                        <textarea class="form-control mb-4  @error('description') is-invalid @enderror" name="description"
                                            placeholder="Message..." id="exampleFormControlTextarea1" rows="3"></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="uploadFile border rounded">
                                            <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i>
                                            <span class="filename">Upload charter Image</span>
                                            <input type="file"
                                                class="inputfile form-control @error('thumbnail_img') is-invalid @enderror"
                                                name="thumbnail_img">
                                            @error('thumbnail_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </label>
                                    </div>

                                    <div class="row gx-2">
                                        <div class="col-12 col-lg-6">
                                            <label>Date Of Avaliabilty</label>
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" name="date_of_avalability[]"
                                                    aria-label="Recipient username" aria-describedby="button-addon2">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="button-addon2"><i class="fa fa-calendar"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="row gx-2">
                                                <label>Time Of Avaliabilty</label>
                                                <div class="col-12 col-md-12">
                                                    <div class="input-group mb-3">
                                                        <input type="time" class="form-control" name="start_time[]"
                                                            aria-label="Text input with dropdown button">
                                                    </div>
                                                </div>
                                                <div class="d-grid d-md-flex justify-content-md-end mb-2">
                                                    <button class="btn btn-primary" type="button"
                                                        onclick="addMoreAvalibilty()"><span><i class="fa fa-plus me-2"
                                                                aria-hidden="true"></i></span>Add
                                                        More</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="addAvaliabilty">

                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-from-label">{{ translate('Tags') }}</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="inputfile form-control"
                                                        data-role="tagsinput" name="tags"
                                                        placeholder="{{ translate('Type and hit enter to add a tag') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-12 col-md-4">
                                                <label for="exampleInputEmail1">Max Guests/Travels</label>
                                                <select class="form-select py-2 @error('max_guests') is-invalid @enderror"
                                                    name="max_guests" aria-label="Default select example"
                                                    id="select-products">
                                                    <option value="">-Select-</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>

                                                @error('max_guests')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-8 align-self-end">
                                                <label>Delivory Option</label>
                                                <div class="input-type-check d-flex flex-wrap">
                                                    @foreach ($delivery_options as $delivery_option)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="delivery_id[]" value="{{ $delivery_option->id }}"
                                                                id="flexCheckDefault{{ $delivery_option->id }}">
                                                            <label class="form-check-label"
                                                                for="flexCheckDefault{{ $delivery_option->id }}">
                                                                {{ $delivery_option->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row gx-2 align-items-baseline">
                                            <div class="col-12 col-md-8 mb-3">
                                                <label
                                                    class="uploadFile border rounded @error('charter_agreement') is-invalid @enderror">
                                                    <i class="fa fa-cloud-upload upload-icon-account-1"
                                                        aria-hidden="true"></i>
                                                    <span class="filename">Upload charter agreement</span>
                                                    <input type="file" class="inputfile form-control"
                                                        name="charter_agreement[]" multiple>
                                                    @error('charter_agreement')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </label>
                                            </div>
                                            <h5 class="mb-2">Specifications General</h5>
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Model
                                                            Series Name </label>
                                                        <input type="text" name="model_series_name"
                                                            class="form-control">
                                                        @if ($errors->has('model_series_name'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('model_series_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Model
                                                            Number </label>
                                                        <input type="text" name="model_number" class="form-control">
                                                        @if ($errors->has('model_number'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('model_number') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Primary
                                                            Meterial</label>
                                                        <input type="text" name="primary_meterial"
                                                            class="form-control">
                                                        @if ($errors->has('primary_meterial'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('primary_meterial') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Primary
                                                            Meterial SubType</label>
                                                        <input type="text" name="primary_meterial_subType"
                                                            class="form-control">
                                                        @if ($errors->has('primary_meterial_subType'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('primary_meterial_subType') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Delivery
                                                            Condition </label>
                                                        <input type="text" name="delivery_condition"
                                                            class="form-control">
                                                        @if ($errors->has('delivery_condition'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('delivery_condition') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Suitable
                                                            For</label>
                                                        <input type="text" name="suitable_for" class="form-control">
                                                        @if ($errors->has('suitable_for'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('suitable_for') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Compatible Laptop Size</label>
                                                        <input type="text" name="compatible_laptop_size"
                                                            class="form-control">
                                                        @if ($errors->has('compatible_laptop_size'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('compatible_laptop_size') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Foldable</label>
                                                        <input type="text" name="foldable" class="form-control">
                                                        @if ($errors->has('foldable'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('foldable') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Adjustable Height</label>
                                                        <input type="text" name="adjustable_height"
                                                            class="form-control" multiple>
                                                        @if ($errors->has('adjustable_height'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('adjustable_height') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <h5 class="mb-3">Demensions</h5>

                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Width</label>
                                                        <input type="text" name="width" class="form-control">
                                                        @if ($errors->has('width'))
                                                            <span class="text-danger">{{ $errors->first('width') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Height</label>
                                                        <input type="text" name="height" class="form-control">
                                                        @if ($errors->has('height'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('height') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Depth</label>
                                                        <input type="text" name="depth" class="form-control">
                                                        @if ($errors->has('depth'))
                                                            <span class="text-danger">{{ $errors->first('depth') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Weight</label>
                                                        <input type="text" name="weight" class="form-control">
                                                        @if ($errors->has('weight'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('weight') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">First
                                                            Image </label>
                                                        <input type="file" name="first_image" class="form-control">
                                                        @if ($errors->has('first_image'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('first_image') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">first
                                                            Description</label>
                                                        <input type="text" name="first_description"
                                                            class="form-control" multiple>
                                                        @if ($errors->has('first_description'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('first_description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Second
                                                            Image </label>
                                                        <input type="file" name="second_image" class="form-control"
                                                            multiple>
                                                        @if ($errors->has('second_image'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('second_image') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Second
                                                            Description</label>
                                                        <input type="text" name="second_description"
                                                            class="form-control" multiple>
                                                        @if ($errors->has('second_description'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('second_description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Third
                                                            image </label>
                                                        <input type="file" name="third_image" class="form-control"
                                                            multiple>
                                                        @if ($errors->has('third_image'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('third_image') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label">Third
                                                            description</label>
                                                        <input type="text" name="third_description"
                                                            class="form-control" multiple>
                                                        @if ($errors->has('third_description'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('third_description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="input-type-check d-flex flex-wrap">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input @error('terms_condition') is-invalid @enderror"
                                                            type="checkbox" name="terms_condition" value="1"
                                                            id="Term&Condition">
                                                        <label class="form-check-label" for="Term&Condition">
                                                            Term & Condition
                                                        </label>
                                                        @error('terms_condition')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid d-lg-block">
                                    <button class="btn btn-primary mx-1 my-2" type="submit">Submit
                                        Product</button>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="charter-management-table table-responsive">
                                <table class="table table-bordered text-center" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Deposit</th>
                                            <th scope="col">Rate</th>
                                            {{-- <th scope="col">Day/Hr</th> --}}
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Date of Availabilty</th>
                                            <th scope="col">Time of Availabilty</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Max Guests/ Travelers</th>
                                            {{-- <th scope="col">Service Offered As</th> --}}
                                            <th scope="col">Upload Charter Agreement</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($charters as $key => $charter)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $charter->charter_name }}</td>
                                                <td>{{ $charter->charter_type }}</td>
                                                <td>$50</td>
                                                <td>${{ $charter->rate }}</td>
                                                {{-- <td>Hr.</td> --}}
                                                <td>{!! Str::words($charter->description, 2, '...') !!}</td>
                                                <td>
                                                    <img src="{{ $charter->thumbnail_img }}" alt=""
                                                        onerror="this.src='{{ asset('images/default.png') }}'"
                                                        width="80px;" height="80px">

                                                </td>
                                                <td>
                                                    @foreach ($charter->charterAvaliabiltyDateAndTimes as $item)
                                                        <i class="fa fa-calendar" aria-hidden="true">
                                                            {{ isset($item->date_of_avalability) ? $item->date_of_avalability->format('d-M-Y') : '' }}
                                                        </i>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($charter->charterAvaliabiltyDateAndTimes as $item)
                                                        <i class="fa fa-clock-o" aria-hidden="true">
                                                            {{ isset($item->time_of_avalability) ? $item->time_of_avalability->format('h:m A') : '' }}
                                                        </i>
                                                    @endforeach

                                                </td>

                                                <td>
                                                    <div class="table-tag">
                                                        <ul class="list-unstyled mb-0">
                                                            @foreach ($charter->tags as $item)
                                                                <li class="close-btn-tab">
                                                                    {{ $item->name }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>{{ $charter->max_guests }}</td>
                                                {{-- <td>Local</td> --}}
                                                <td>
                                                    @foreach (json_decode($charter->charter_agreement) as $image)
                                                        <img src="{{ $image }}"
                                                            onerror="this.src='{{ asset('images/default.png') }}'"
                                                            alt="" width="80px;">
                                                    @break
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

    <script>
        function addMoreAvalibilty() {
            let temp_id = Math.floor(Math.random() * 1000000000);
            let html = '<div class="removeAvaliblty' + temp_id +
                ' row"><div class="col-12 col-lg-6"><label>Date Of Avaliabilty</label><div class="input-group mb-3"><input type="date" class="form-control" name="date_of_avalability[]" aria-label="Recipient username" aria-describedby="button-addon2"><button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-calendar" aria-hidden="true"></i></button></div></div><div class="col-12 col-lg-6"><div class="row gx-2"><label>Time Of Avaliabilty</label><div class="col-12 col-md-12"><div class="input-group mb-3"><input type="time" class="form-control" name="start_time[]" aria-label="Text input with dropdown button"></div></div><div class="d-grid d-md-flex justify-content-md-end mb-2"><button class="btn btn-danger" type="button" onclick="removeMoreAvalibilty(' +
                temp_id +
                ')"><span><i class="fa fa-minus me-2" aria-hidden="true"></i></span> Remove </button></div></div></div></div>';
            $('.addAvaliabilty').append(html);
        }

        function removeMoreAvalibilty(id) {
            $('.removeAvaliblty' + id).remove();
        }
    </script>
@endsection
