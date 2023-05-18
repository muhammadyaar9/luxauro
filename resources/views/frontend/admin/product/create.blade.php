@extends('frontend.admin.layouts.app')
@section('title')
    <title>Create Product</title>
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

    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Product</h5>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" value="Pending" name="status">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Name </label>
                                    <input type="text"
                                        class="form-control @error('product_name') is-invalid @enderror"name="product_name"
                                        placeholder="Product Name" title="Product Name" value="{{ old('product_name') }}" />
                                    @if ($errors->has('product_name'))
                                        <span class="text-danger mt-2">{{ $errors->first('product_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product SKU </label>
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror"
                                        name="sku" placeholder="Product Sku" title="Product Sku"
                                        value="{{ old('sku') }}" />
                                    @if ($errors->has('sku'))
                                        <span class="text-danger">{{ $errors->first('sku') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">ProductId </label>
                                    <input type="text"
                                        class="form-control @error('productId') is-invalid @enderror"name="productId"
                                        placeholder="Product Id" title="Product Name" value="{{ old('productId') }}" />
                                    @if ($errors->has('productId'))
                                        <span class="text-danger mt-2">{{ $errors->first('productId') }}</span>
                                    @endif
                                </div>
                            </div>
                             <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">MSRF</label>
                                    <input type="number" class="form-control @error('msrf') is-invalid @enderror"
                                        name="msrf" placeholder="Product Msrf" title="Product Msrf"
                                        value="{{ old('msrf') }}" />
                                    @if ($errors->has('msrf'))
                                        <span class="text-danger">{{ $errors->first('msrf') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Modal Number</label>
                                    <input type="text" class="form-control @error('modal_number') is-invalid @enderror"
                                        name="modal_number" placeholder="Modal Number" title="Modal Number"
                                        value="{{ old('modal_number') }}" />
                                    @if ($errors->has('modal_number'))
                                        <span class="text-danger">{{ $errors->first('modal_number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Serial Number</label>
                                    <input type="text" class="form-control @error('serial_number') is-invalid @enderror"
                                        name="serial_number" placeholder="Serial Number" title="Serial Number"
                                        value="{{ old('serial_number') }}" />
                                    @if ($errors->has('serial_number'))
                                        <span class="text-danger">{{ $errors->first('serial_number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                                    <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                        name="quantity" placeholder="Quantity" title="Quantity"
                                        value="{{ old('quantity') }}" />
                                    @if ($errors->has('quantity'))
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Price </label>
                                    <input type="text" class="form-control @error('product_price') is-invalid @enderror"
                                        name="product_price" placeholder="Product Price" title="Product Price"
                                        value="{{ old('product_price') }}" />
                                    @if ($errors->has('product_price'))
                                        <span class="text-danger">{{ $errors->first('product_price') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                                    <textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description"
                                        rows="3" placeholder="Product Description" title="Product Description">{{ old('product_description') }}</textarea>
                                    @if ($errors->has('product_description'))
                                        <span class="text-danger">{{ $errors->first('product_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Tags</label>
                                    <input class="form-control @error('tags') is-invalid @enderror" type="text"
                                        data-role="tagsinput" name="tags" value="{{ old('tags') }}" placeholder="Tags">
                                    @if ($errors->has('tags'))
                                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">product thumbnail Image</label>
                                    <input type="file" class="form-control @error('product_image') is-invalid @enderror"
                                        name="product_image" placeholder="Product Image" title="Product Image" />
                                    @if ($errors->has('product_image'))
                                        <span class="text-danger">{{ $errors->first('product_image') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Type </label>
                                    <select class="form-control @error('product_type_id') is-invalid @enderror"
                                        name="product_type_id">
                                        <option value="">Select Product Type</option>
                                        @foreach ($productType as $productTyp)
                                            <option
                                                value="{{ $productTyp->id }}"{{ $productTyp->id == old('product_type_id') ? 'selected' : '' }}>
                                                {{ $productTyp->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('product_type_id'))
                                        <span class="text-danger">{{ $errors->first('product_type_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Product Category </label>
                                    <select class="form-control @error('category_id') is-invalid @enderror "
                                        name="category_id">
                                        <option value="">Select Product Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Delivory Option
                                    </label>
                                    <select class="form-control @error('delivery_option_id') is-invalid  @enderror"
                                        name="delivery_option_id">
                                        <option value="">Select Delivory Option</option>
                                        @foreach ($delivoryOption as $delivoryOp)
                                            <option value="{{ $delivoryOp->id }}"
                                                {{ $delivoryOp->id == old('delivery_option_id') ? 'selected' : '' }}>
                                                {{ $delivoryOp->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('delivery_option_id'))
                                        <span class="text-danger">{{ $errors->first('delivry_option_id') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Shipping Type </label>
                                    <select class="form-control @error('shipping_type_id') is-invalid  @enderror "
                                        name="shipping_type_id">
                                        <option value="">Select Shipping Type</option>
                                        @foreach ($shippingType as $shippingTy)
                                            <option value="{{ $shippingTy->id }}"
                                                {{ $shippingTy->id == old('shipping_type_id') ? 'selected' : '' }}>
                                                {{ $shippingTy->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('shipping_type_id'))
                                        <span class="text-danger">{{ $errors->first('shipping_type_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Shipping Charge
                                    </label>
                                    <input type="number"
                                        class="form-control @error('shipping_charge') is-invalid @enderror"
                                        name="shipping_charge" placeholder="Shipping Charge" title="Shipping Charge"
                                        value="{{ old('shipping_charge') }}" />
                                    @if ($errors->has('shipping_charge'))
                                        <span class="text-danger">{{ $errors->first('shipping_charge') }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Product Multiple
                                            images </label>
                                        <input type="file" name="multiple_image[]" class="form-control" multiple>
                                        @if ($errors->has('multiple_image'))
                                            <span class="text-danger">{{ $errors->first('multiple_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <h5 class="mt-4">Specifications  General</h5>

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Model Series Name </label>
                                        <input type="text" name="model_series_name" class="form-control" >
                                        @if ($errors->has('model_series_name'))
                                            <span class="text-danger">{{ $errors->first('model_series_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Model Number </label>
                                        <input type="text" name="model_number" class="form-control" >
                                        @if ($errors->has('model_number'))
                                            <span class="text-danger">{{ $errors->first('model_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Primary Meterial</label>
                                        <input type="text" name="primary_meterial" class="form-control" >
                                        @if ($errors->has('primary_meterial'))
                                            <span class="text-danger">{{ $errors->first('primary_meterial') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Primary Meterial SubType</label>
                                        <input type="text" name="primary_meterial_subType" class="form-control">
                                        @if ($errors->has('primary_meterial_subType'))
                                            <span class="text-danger">{{ $errors->first('primary_meterial_subType') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Delivery Condition </label>
                                        <input type="text" name="delivery_condition" class="form-control" >
                                        @if ($errors->has('delivery_condition'))
                                            <span class="text-danger">{{ $errors->first('delivery_condition') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Suitable For</label>
                                        <input type="text" name="suitable_for" class="form-control" >
                                        @if ($errors->has('suitable_for'))
                                            <span class="text-danger">{{ $errors->first('suitable_for') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Compatible Laptop Size</label>
                                        <input type="text" name="compatible_laptop_size" class="form-control" >
                                        @if ($errors->has('compatible_laptop_size'))
                                            <span class="text-danger">{{ $errors->first('compatible_laptop_size') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Foldable</label>
                                        <input type="text" name="foldable" class="form-control" >
                                        @if ($errors->has('foldable'))
                                            <span class="text-danger">{{ $errors->first('foldable') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Adjustable Height</label>
                                        <input type="text" name="adjustable_height" class="form-control" multiple>
                                        @if ($errors->has('adjustable_height'))
                                            <span class="text-danger">{{ $errors->first('adjustable_height') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <h5 class="mt-5">Demensions</h5>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Width</label>
                                        <input type="text" name="width" class="form-control" >
                                        @if ($errors->has('width'))
                                            <span class="text-danger">{{ $errors->first('width') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Height</label>
                                        <input type="text" name="height" class="form-control">
                                        @if ($errors->has('height'))
                                            <span class="text-danger">{{ $errors->first('height') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Depth</label>
                                        <input type="text" name="depth" class="form-control">
                                        @if ($errors->has('depth'))
                                            <span class="text-danger">{{ $errors->first('depth') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Weight</label>
                                        <input type="text" name="weight" class="form-control" >
                                        @if ($errors->has('weight'))
                                            <span class="text-danger">{{ $errors->first('weight') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">First Image </label>
                                        <input type="file" name="first_image" class="form-control">
                                        @if ($errors->has('first_image'))
                                            <span class="text-danger">{{ $errors->first('first_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">first Description</label>
                                        <input type="text" name="first_description" class="form-control" multiple>
                                        @if ($errors->has('first_description'))
                                            <span class="text-danger">{{ $errors->first('first_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Second Image </label>
                                        <input type="file" name="second_image" class="form-control" multiple>
                                        @if ($errors->has('second_image'))
                                            <span class="text-danger">{{ $errors->first('second_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Second Description</label>
                                        <input type="text" name="second_description" class="form-control" multiple>
                                        @if ($errors->has('second_description'))
                                            <span class="text-danger">{{ $errors->first('second_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Third image </label>
                                        <input type="file" name="third_image" class="form-control" multiple>
                                        @if ($errors->has('third_image'))
                                            <span class="text-danger">{{ $errors->first('third_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Third description</label>
                                        <input type="text" name="third_description" class="form-control" multiple>
                                        @if ($errors->has('third_description'))
                                            <span class="text-danger">{{ $errors->first('third_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('product.index') }}"
                                        class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" onclick="this.form.submit();this.disabled=true;">Submit</button>
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
@endsection
