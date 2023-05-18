@extends('frontend.layouts.app')

@section('title')
    <title>Product Management</title>
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
                <div class="col-12 col-md-8 gx-0 gx-md-5">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active me-3" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="true">Product Management</button>
                            <!-- <span class="mb-0 text-secondary text-font">You are offering something for rent</span> -->
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                                type="button" role="tab" aria-controls="pills-home" aria-selected="false">Upload
                                Product</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <input type="hidden" value="vendorSide" name="vendorSide">
                                <div class="row gx-2">
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" name="product_name"
                                            class="form-control mb-3 p-2 @error('product_name') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('product_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputPassword1">Product Price</label>
                                        <input type="price" name="product_price"
                                            class="form-control mb-3 p-2 @error('product_price') is-invalid @enderror"
                                            id="exampleInputPassword1">
                                        @error('product_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputPassword1">UPC</label>
                                        <input type="price" name="upc"
                                            class="form-control mb-3 p-2 @error('price') is-invalid @enderror"
                                            id="exampleInputPassword1">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row gx-2">
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputEmail1">SKU</label>
                                        <input type="text" name="sku"
                                            class="form-control mb-3 p-2 @error('sku') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('sku')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputPassword1">Product ID</label>
                                        <input type="text" name="productId"
                                            class="form-control mb-3 p-2 @error('productId') is-invalid @enderror"
                                            id="exampleInputPassword1">
                                        @error('productId')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputPassword1">Modal Number</label>
                                        <input type="number" name="modal_number"
                                            class="form-control mb-3 p-2 @error('modal_number') is-invalid @enderror"
                                            id="exampleInputPassword1">
                                        @error('modal_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputPassword1">Quantity</label>
                                        <input type="number" name="quantity"
                                            class="form-control mb-3 p-2 @error('quantity') is-invalid @enderror"
                                            id="exampleInputPassword1">
                                        @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputPassword1">MSRF</label>
                                        <input type="number" name="msrf"
                                            class="form-control mb-3 p-2 @error('msrf') is-invalid @enderror"
                                            id="exampleInputPassword1">
                                        @error('msrf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="exampleInputPassword1">Serial Number</label>
                                        <input type="number" name="serial_number"
                                            class="form-control mb-3 p-2 @error('serial_number') is-invalid @enderror"
                                            id="exampleInputPassword1">
                                        @error('serial_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <label for="select-products">products Type</label>
                                <select class="form-select mb-3" aria-label="Default select example"
                                    name="product_type_id" id="select-products">
                                    <option selected>-Select-</option>

                                    @foreach ($product_types as $product_type)
                                        <option value="{{ $product_type->id }}">{{ $product_type->title }}</option>
                                    @endforeach
                                </select>
                                <label for="select-products">In this is an Auction Product?</label>
                                <select class="form-select mb-3 w-25" aria-label="Default select example"
                                    name="is_auction" id="select-products">
                                    <option selected></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <div class="text-area">
                                    <label for="exampleInputPassword1">Product Description</label>
                                    <textarea class="form-control mb-4 @error('product_description') is-invalid @enderror" name="product_description"
                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                    @error('product_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="uploadFile border rounded">
                                        <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i>
                                        <span class="filename">Upload product image</span>
                                        <input type="file"
                                            class="inputfile form-control @error('product_image') is-invalid @enderror"
                                            name="product_image">
                                        @error('product_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label class="uploadFile border rounded">
                                        <i class="fa fa-cloud-upload upload-icon-account-1" aria-hidden="true"></i>
                                        <span class="filename">Upload product Gallery images</span>
                                        <input type="file"
                                            class="inputfile form-control @error('multiple_image') is-invalid @enderror"
                                            name="multiple_image[]" multiple>
                                        @error('multiple_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </label>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tags</label>
                                    <input class="form-control" type="text" data-role="tagsinput" name="tags"
                                        value="{{ old('tags') }}" placeholder="Tags">
                                </div>
                                <div class="input-groups mb-3">
                                    <label>Product Category</label>

                                    <div class="input-type-check d-flex flex-wrap">
                                        @foreach ($categories as $category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="category_id[]"
                                                    value="{{ $category->id }}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $category->title }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="input-groups mb-3">
                                    <label>Delivory Option
                                        <button type="button" class="question-mark ms-1" data-toggle="tooltip"
                                            data-placement="top" title="How fer are you willing to ship your product(s)">
                                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                                        </button>
                                    </label>
                                    <div class="input-type-check d-flex flex-wrap">
                                        @foreach ($delivery_options as $delivery_option)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="delivery_option_id[]" value="{{ $delivery_option->id }}"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $delivery_option->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6">
                                        <label>Shipping Type</label>
                                        <div class="input-type-check d-flex flex-wrap pt-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="shipping_type[]"
                                                    value="1" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Within USA
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="shipping_type[]"
                                                    value="2" id="flexCheckChecked">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Out side USA
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label>Shipping Charge</label>
                                        <div class="input-group flex-nowrap w-50">
                                            <span class="input-group-text" id="addon-wrapping">$</span>
                                            <input type="number" class="form-control custom-input"
                                                name="shipping_charge" aria-label="Username"
                                                aria-describedby="addon-wrapping">
                                            @error('shipping_charge')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid d-lg-block">
                                    {{-- <button class="btn btn-primary my-2" type="button"><span><i
                                        class="fa fa-plus me-2" aria-hidden="true"></i></span>Add
                                More</button> --}}
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
                                            <th scope="col">UPC</th>
                                            <th scope="col">SKU</th>
                                            <th scope="col">Product ID</th>
                                            <th scope="col">Modal Number</th>
                                            <th scope="col">Serial Number.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Auction</th>
                                            <th scope="col">Product MSRF</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Category</th>
                                            {{-- <th scope="col">Delivery Option</th> --}}
                                            {{-- <th scope="col">Shipping type</th>
                                    <th scope="col">Shipping Charger</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $key => $product)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $product->upc }}</td>
                                                <td>{{ $product->sku }}</td>
                                                <td>{{ $product->productId }}</td>
                                                <td>{{ $product->modal_number }}</td>
                                                <td>{{ $product->serial_number }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->product_type }}</td>
                                                <td>{{ $product->msrf }}</td>
                                                <td>{{ $product->is_auction }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ Str::words($product->product_description, 5, '...') }}</td>
                                                <td>
                                                    {{-- <label class="uploadFile-table border rounded">
                                                        <i class="fa fa-cloud-upload upload-icon-account-1-table"
                                                            aria-hidden="true"></i>
                                                        </label> --}}
                                                    <img src="{{ $product->image }}"
                                                        onerror="this.src='{{ asset('images/default.png') }}'"
                                                        alt="">
                                                </td>
                                                <td>
                                                    <div class="table-tag">
                                                        <ul class="list-unstyled mb-0" style="display: flex">
                                                            @foreach ($product->tags as $item)
                                                                <li class="close-btn-tab">
                                                                    {{ $item->name }}
                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                </li>
                                                                @break
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>
                                                    @forelse ($product->categories as $category)
                                                        {{ $category->title . ',' }}
                                                    @empty
                                                        {{ 'No category assigned' }}
                                                    @endforelse
                                                </td>
                                                {{-- <td>
                                                @forelse ($product->deliveryOption  as $option)
                                                    {{ $option->title.',' }}
                                                @empty
                                                {{ 'No defined option'  }}
                                                @endforelse
                                            </td> --}}
                                                {{-- <td>
                                            @forelse ($product->shippingType  as  $shippingType)
                                                {{ $shippingType }}
                                            @empty
                                                    No shipping type
                                            @endforelse
                                            </td> --}}
                                                {{-- <td>Within Usa, $8
                                            <span class="d-block">Outside Usa $20</td> --}}

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
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                $('#tags').tagsinput('items');
            });
        </script>
    @endsection
