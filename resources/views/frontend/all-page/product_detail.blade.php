@extends('frontend.layouts.app')
@section('title')
    <title>
        Product Detail</title>
@endsection
@section('content')
    <style>
        .input-number-increment {
            border-left: none;
            border-radius: 0 4px 4px 0;
        }

        .input-number-decrement,
        .input-number-increment {
            display: inline-block;
            width: 30px;
            line-height: 38px;
            background: transparent;
            color: #0009;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
        }

        .input-number,
        .input-number-decrement,
        .input-number-increment {
            border: 0px solid #ccc;
            height: 40px;
            user-select: none;
            width: 41px
        }

        .text-#133033 {
            color: #133033;
        }
    </style>
    <div class="inner-content">
        <div class="charter-detail-page mt-4 pt-md-5 mt-md-5 mb-3 mb-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-slider">
                            @foreach (json_decode($product->multiple_image) as $multipleimage)
                                <div>
                                    <img src="{{ $multipleimage }}" onerror="this.src='{{ asset('images/default.png') }}'"
                                        class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                        <div class="detail-nav-slider">
                            @foreach (json_decode($product->multiple_image) as $multipleimage)
                                <div>
                                    <img src="{{ $multipleimage }}" onerror="this.src='{{ asset('images/default.png') }}'"
                                        class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="charter-detail-desc">
                            <h2 class="mb-1">{{ $product->product_name }}</h2>
                            <div class="details-review d-flex align-items-center mb-1">
                                <ul class="list-unstyled m-0 p-0 d-flex stars">
                                    @php
                                        $size = (int) $product->ratings()->avg('rating');
                                        $unstart = 5 - $size;
                                    @endphp
                                    @for ($i = 0; $i < $size; $i++)
                                        <li class="me-1"><i class="fa fa-star" style="color:#133033"></i></li>
                                    @endfor
                                    @for ($i = 0; $i < $unstart; $i++)
                                        <li class="me-1"><i class="bi bi-star"></i></li>
                                    @endfor
                                </ul>
                                <span
                                    class="small">{{ round($product->ratings()->avg('rating'), 1) . '(Based on ' . $product->ratings()->count() . 'Reviews)' }}
                                </span>
                            </div>
                            <p class="py-2">
                                {{-- {!! $product->product_description !!} --}}
                            </p>
                            <p class="price my-2">${{ $product->product_price }}</p>
                            <div class="quantity-btn d-flex align-items-center mb-3">
                                <div class="product-details-quantity border rounded d-inline-block me-3">
                                    <span class="input-number-decrement"
                                        onclick="decrement({{ $product->id }})">–</span><input
                                        class="input-number addOrRemove{{ $product->id }}" type="text" value="1"
                                        min="1" max="10" id=""><span class="input-number-increment"
                                        onclick="increment({{ $product->id }})">+</span>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary"
                                        onclick="addToCart('{{ $product->id }}', '{{ $product->product_name }}', '{{ $product->product_price }}')"
                                        type="button">ADD TO CART</button>
                                </div>
                            </div>
                            <div class="luxauro-fresh d-flex align-items-center">
                                <div class="luxauro-catogery me-5">
                                    <p>Catogery: @foreach ($product->categories as $category)
                                            <strong>{{ $category->title . ',' }}</strong>
                                                @endforeach
                                    </p>
                                </div>
                                <div class="luxauro-catogery me-5">
                                    <p>Tags: <strong>
                                            @foreach ($product->tags as $tags)
                                                {{ $tags->name . ',' }}
                                            @endforeach
                                        </strong></p>
                                </div>
                            </div>
                            <div class="merchant-name">
                                <p>Merchant:
                                    <u>
                                        {{ isset($product->user->userDetails->name) ? $product->user->userDetails->name : '' }}
                                    </u>
                                </p>
                            </div>
                            <div class="description-detail d-flex ">
                                <div class="description-heading">
                                    <p class="price mb-2 me-3">Description</p>
                                </div>
                                <div class="description-para">
                                    <p>{{ $product->product_description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-section mb-5 pb-lg-3">
            <div class="container">
                <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                    <h2 class="m-0">You may also like</h2>
                    <div class="d-flex form-holder">
                        <a class="btn btn-view rounded-0" href="javascript:void">View All</a>
                        <form class="page-form flex-fill" action="#">
                            <div class="page-form-holder d-flex">
                                <label class="form-control rounded-0">Search Filter</label>
                                <div class="form-field d-flex flex-fill">
                                    <select class="flex-fill border-0 bg-transparent">
                                        <option>All</option>
                                        <option>All</option>
                                        <option>All</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="slider Charters-slider">
                    @foreach ($productsasc as $productasc)
                        <div>
                            <div class="product-item">
                                <a
                                    href="{{ route('productDetails', ['id' => $productasc->id, 'slug' => Str::slug($productasc->product_name)]) }}">
                                    <div class="img-holder">
                                        <img src="{{ $productasc->image }}"
                                            onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                    </div>
                                </a>
                                <div class="txt-holder">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <a href="{{ route('productDetails', ['id' => $productasc->id, 'slug' => Str::slug($productasc->product_name)]) }}"
                                                style="color: black">
                                                <strong class="title">{{ $productasc->product_name }}</strong>
                                            </a>
                                            <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                @php
                                                    $size = (int) $productasc->ratings()->avg('rating');
                                                    $unstart = 5 - $size;
                                                @endphp
                                                @for ($i = 0; $i < $size; $i++)
                                                    <li class="me-1"><i class="fa fa-star" style="color: #133033"></i>
                                                    </li>
                                                @endfor
                                                @for ($i = 0; $i < $unstart; $i++)
                                                    <li class="me-1"><i class="bi bi-star"></i></li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <i class="fa fa-globe fa-1x mt-2"></i>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong class="title">${{ $productasc->product_price }}</strong>
                                        <button class="btn bg-dark text-white py-1 px-2"
                                            onclick="addToCart('{{ $productasc->id }}', '{{ $productasc->product_name }}', '{{ $productasc->product_price }}')"><i
                                                class="fa fa-shopping-basket"></i>
                                        </button>
                                    </div>
                                    <input type="hidden" class="addOrRemove{{ $productasc->id }}" value="1">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="charter-specs-section mb-3 mb-md-5">
            <div class="container">
                <div class="col-md-10 mx-auto">
                    <div class="row gx-5">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-7 mb-3 mb-md-4">
                                    <img src="{{  isset($product->spacificationgeneral->first_image) ?  $product->spacificationgeneral->first_image  : '' }}" class="img-fluid w-100" onerror="this.src='{{ asset('images/default.png') }}'">
                                </div>
                                <div class="col-md-5 mb-3 mb-md-4">
                                    <p>
                                        {!! isset($product->spacificationgeneral->first_description) ?  $product->spacificationgeneral->first_description  : '' !!}

                                    </p>
                                </div>
                                <div class="col-md-5 mb-3 mb-md-4">
                                    <p>
                                        {!! isset($product->spacificationgeneral->second_description) ?  $product->spacificationgeneral->second_description  : '' !!}

                                    </p>
                                </div>
                                <div class="col-md-7 mb-3 mb-md-4">
                                    <img src="{{ isset($product->spacificationgeneral->second_image) ?  $product->spacificationgeneral->second_image  : '' }}" class="img-fluid w-100" onerror="this.src='{{ asset('images/default.png') }}'" >
                                </div>
                                <div class="col-md-7 mb-3 mb-md-4">
                                    <img src="{{ isset($product->spacificationgeneral->third_image) ?  $product->spacificationgeneral->third_image  : '' }}" class="img-fluid w-100" onerror="this.src='{{ asset('images/default.png') }}'">
                                </div>
                                <div class="col-md-5 mb-3 mb-md-4">
                                    <p>
                                        {!! isset($product->spacificationgeneral->third_description) ?  $product->spacificationgeneral->third_description  : '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h3 class="mb-4"><strong>Specifications</strong> </h3>
                            <h4 class="mb-3"><strong>General</strong></h4>
                            <table class="w-100 mb-5">
                                <tr>
                                    <td>Model Series Name</td>
                                    <td>{{ isset($product->spacificationgeneral->model_series_name) ?  $product->spacificationgeneral->model_series_name  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Model Number</td>
                                    <td>{{ isset($product->spacificationgeneral->model_number) ?  $product->spacificationgeneral->model_number  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Primary Meterial</td>
                                    <td>{{ isset($product->spacificationgeneral->primary_meterial) ?  $product->spacificationgeneral->primary_meterial  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Primary Meterial SubType</td>
                                    <td>{{ isset($product->spacificationgeneral->primary_meterial_subType) ?  $product->spacificationgeneral->primary_meterial_subType  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Delivery Condition</td>
                                    <td>{{ isset($product->spacificationgeneral->delivery_condition) ?  $product->spacificationgeneral->delivery_condition  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Suitable For</td>
                                    <td>{{ isset($product->spacificationgeneral->suitable_for) ?  $product->spacificationgeneral->suitable_for  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Compatible Laptop Size</td>
                                    <td>{{ isset($product->spacificationgeneral->compatible_laptop_size) ?  $product->spacificationgeneral->compatible_laptop_size  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Foldable</td>
                                    <td>{{ isset($product->spacificationgeneral->foldable) ?  $product->spacificationgeneral->foldable  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Adjustable Height</td>
                                    <td>{{ isset($product->spacificationgeneral->adjustable_height) ?  $product->spacificationgeneral->adjustable_height  : '' }}</td>
                                </tr>
                            </table>
                            <h4 class="mb-3"><strong>Demensions</strong></h4>
                            <table class="w-100">
                                <tr>
                                    <td>Width</td>
                                    <td>{{ isset($product->spacificationgeneral->width) ?  $product->spacificationgeneral->width  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td>{{ isset($product->spacificationgeneral->height) ?  $product->spacificationgeneral->height  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Depth</td>
                                    <td>{{ isset($product->spacificationgeneral->depth) ?  $product->spacificationgeneral->depth  : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Weight</td>
                                    <td>{{ isset($product->spacificationgeneral->weight) ?  $product->spacificationgeneral->weight  : '' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="product-section mb-5 pb-lg-3 mt-3">
            <div class="container">
                <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                    <h2 class="m-0">More from this suite</h2>
                    <div class="d-flex form-holder">
                        <a class="btn btn-view rounded-0" href="{{ route('suits') }}">View All</a>
                        <form class="page-form flex-fill" action="#">
                            <div class="page-form-holder d-flex">
                                <label class="form-control rounded-0">Search Filter</label>
                                <div class="form-field d-flex flex-fill">
                                    <select class="flex-fill border-0 bg-transparent nationalShop" name="shopfilter">
                                        <option value="">Order By</option>
                                        <option value="AZ">(A-Z)</option>
                                        <option value="ZA">(Z-A)</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="slider national-shop-slider text-center nationshopdiv">
                    @forelse ($suits as $nationalshop)
                        <div>
                            <div class="product-item">
                                <a href="{{ route('suitsProducts', $nationalshop->id) }}">
                                    <div class="img-holder">
                                        <img src="{{ $nationalshop->business_logo }}"
                                            onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                    </div>
                                </a>
                                <div class="txt-holder">
                                    <a href="{{ route('suitsProducts', $nationalshop->id) }}"
                                        style="text-decoration: none;color:rgb(42, 40, 40)">
                                        <strong class="title">{{ $nationalshop->business_name }}</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty

                        <div class="row">
                            <h2>
                                No National Shops Found
                            </h2>
                        </div>
                    @endforelse
                </div>
                <div class="nationalShopFilter">

                </div>
            </div>
        </div>
        <div class="product-section mb-5 pb-lg-3">
            <div class="container">
                <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                    <h2 class="m-0">You may also like</h2>
                    <div class="d-flex form-holder">
                        <a class="btn btn-view rounded-0" href="javascript:void">View All</a>
                        <form class="page-form flex-fill" action="#">
                            <div class="page-form-holder d-flex">
                                <label class="form-control rounded-0">Search Filter</label>
                                <div class="form-field d-flex flex-fill">
                                    <select class="flex-fill border-0 bg-transparent">
                                        <option>All</option>
                                        <option>All</option>
                                        <option>All</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="slider product-slider">

                    @foreach ($productsdesc as $productsdescs)
                        <div>
                            <div class="product-item">
                                <a
                                    href="{{ route('productDetails', ['id' => $productsdescs->id, 'slug' => Str::slug($productsdescs->product_name)]) }}">
                                    <div class="img-holder">
                                        <img src="{{ $productsdescs->image }}"
                                            onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                    </div>
                                </a>
                                <div class="txt-holder">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <a href="{{ route('productDetails', ['id' => $productsdescs->id, 'slug' => Str::slug($productsdescs->product_name)]) }}"
                                                style="color: black">
                                                <strong class="title">{{ $productsdescs->product_name }}</strong>
                                            </a>
                                            <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                @php
                                                    $size = (int) $productsdescs->ratings()->avg('rating');
                                                    $unstart = 5 - $size;
                                                @endphp
                                                @for ($i = 0; $i < $size; $i++)
                                                    <li class="me-1"><i class="fa fa-star"
                                                            style="color:#133033 !importent"></i>
                                                    </li>
                                                @endfor
                                                @for ($i = 0; $i < $unstart; $i++)
                                                    <li class="me-1"><i class="bi bi-star"></i></li>
                                                @endfor
                                            </ul>
                                        </div>
                                        <i class="fa fa-globe fa-1x mt-2"></i>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong class="title">${{ $productsdescs->product_price }}</strong>
                                        <button class="btn bg-dark text-white py-1 px-2"
                                            onclick="addToCart('{{ $productsdescs->id }}', '{{ $productsdescs->product_name }}', '{{ $productsdescs->product_price }}')"><i
                                                class="fa fa-shopping-basket"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
        @livewire('product-ratings', ['product' => $product], key($product->id))
    @endsection
