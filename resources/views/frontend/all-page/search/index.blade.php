@extends('frontend.layouts.app')
@section('title')
    <title>
        Product Search
    </title>
@endsection
@section('content')
    <div class="inner-content mt-5 pt-3">
        <div class="product-page-section">
            <div class="col-12 col-md-10 mx-auto">
                <div class="product-section mb-5 pb-lg-3">
                    <div class="container">
                        <div class="d-md-flex justify-content-between align-items-center flex-wrap mb-3">
                            <div class="mb-3 mb-md-0">
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home </a></li>
                                    / Search results - ( {{ $products->count() }} )
                                    <li class="breadcrumb-item active" aria-current="page">

                                </ol>
                            </div>

                            {{-- Search results - "[Search terms]" --}}
                        </div>
                        {{-- <div class="mb-3 mb-md-0">
                            <h2 style="font-size: 20px;">Search results - #### </h2>
                            <div class="d-flex align-items-center justify-content-end">
                                <label>Result per page</label>
                                <select class="form-select ms-3" aria-label="Default select example"
                                    style="width: 75px;">
                                    <option selected></option>
                                    <option value="1">10</option>
                                    <option value="2">20</option>
                                    <option value="3">30</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <form class="page-form mx-auto mb-5" action="{{ route('productsearch') }}" method="post">
                        @csrf
                        <div class="page-form-holder d-flex"> --}}
                    {{-- <select class="form-control select-control border-0 rounded-0 flex-fill">
                                <option>All</option>
                                <option>All</option>
                                <option>All</option>
                            </select> --}}
                    {{-- <div class="form-field d-flex flex-fill">
                                <input type="search" placeholder="Search..." name="search" class="border-0 bg-transparent flex-fill">
                                <button type="submit" class="bg-transparent border-0 flex-fill"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form> --}}
                    <div class="Luxaurolicious-slider ">
                        <div class="row mb-3">

                            @foreach ($products as $product)
                                <div class="col-md-2  col-12 my-2">
                                    <div class="product-item">
                                        <a
                                            href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}">
                                            <div class="img-holder">
                                                <img src="{{ $product->image }}"
                                                    onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                            </div>
                                        </a>
                                        <div class="txt-holder">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}"
                                                        style="color: black;">
                                                        <strong class="title">{{ $product->product_name }}</strong>
                                                    </a>
                                                    <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                        @php
                                                            $size = (int) $product->ratings()->avg('rating');
                                                            $unstart = 5 - $size;
                                                        @endphp
                                                        @for ($i = 0; $i < $size; $i++)
                                                            <li class="me-1"><i class="fa fa-star"
                                                                    style="color: #133033"></i>
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
                                                <strong class="title">${{ $product->product_price }}</strong>
                                                <button class="btn bg-dark text-white py-1 px-2"
                                                    onclick="addToCart('{{ $product->id }}', '{{ $product->product_name }}', '{{ $product->product_price }}')"><i
                                                        class="fa fa-shopping-basket"></i>

                                                </button>
                                                <input type="hidden" name="" value="1" class="addOrRemove{{ $product->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        {!! $products->appends(Request::all())->links() !!}
                    </div>
                    {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav> --}}
                    {{-- <div class=" mb-4">
                        <div class="container-fluid p-5">
                            <div class="col-md-10 mx-auto">
                                <div class="">
                                    <img src="{{ isset($banner->image) ? $banner->image : '' }}"
                                        onerror="this.src='{{ asset('images/default.png') }}'" alt=""
                                        width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-section mb-5 pb-lg-3">
                        <div class="container">
                            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                                <h2 class="m-0">Related items</h2>
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
                            <div class="slider Luxauro-fresh-slider product-detail-merchant">

                                @foreach ($relatedProducts as $relatedProduct)
                                    <div>
                                        <div class="product-item">
                                            <a
                                                href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}">
                                                <div class="img-holder">
                                                    <img src="{{ $relatedProduct->image }}"
                                                        onerror="this.src'{{ asset('images/default.png') }}'"
                                                        class="img-fluid">
                                                </div>
                                            </a>
                                            <div class="txt-holder">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div>
                                                        <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}"
                                                            style="color:black;">
                                                            <strong
                                                                class="title">{{ $relatedProduct->product_name }}</strong>
                                                        </a>
                                                        <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <i class="fa fa-globe fa-1x mt-2"></i>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong class="title">${{ $relatedProduct->product_price }}</strong>
                                                    <button class="btn bg-dark text-white py-1 px-2"
                                                        onclick="addToCart('{{ $relatedProduct->id }}', '{{ $relatedProduct->product_name }}', '{{ $relatedProduct->product_price }}')"><i
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
                            <div class="slider Luxauro-fresh-slider product-detail-merchant">
                                @foreach ($relatedProducts as $relatedProduct)
                                    <div>
                                        <div class="product-item">
                                            <a
                                                href="{{ route('productDetails', ['id' => $relatedProduct->id, 'slug' => Str::slug($relatedProduct->product_name)]) }}">
                                                <div class="img-holder">
                                                    <img src="{{ $relatedProduct->image }}"
                                                        onerror="this.src'{{ asset('images/default.png') }}'"
                                                        class="img-fluid">
                                                </div>
                                            </a>
                                            <div class="txt-holder">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div>
                                                        <a href="{{ route('productDetails', ['id' => $relatedProduct->id, 'slug' => Str::slug($relatedProduct->product_name)]) }}"
                                                            style="color:black;">
                                                            <strong
                                                                class="title">{{ $relatedProduct->product_name }}</strong>
                                                        </a>
                                                        <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                            <li class="me-1"><i class="fa fa-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <i class="fa fa-globe fa-1x mt-2"></i>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <strong class="title">${{ $relatedProduct->product_price }}</strong>
                                                    <button class="btn bg-dark text-white py-1 px-2"
                                                        onclick="addToCart('{{ $relatedProduct->id }}', '{{ $relatedProduct->product_name }}', '{{ $relatedProduct->product_price }}')"><i
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
                    <div class="mb-4" style="width: 100%">
                        <div class="container-fluid p-5">
                            <div class="col-md-10 mx-auto">
                                <div class="merchant-banner-text">
                                    <img src="{{ isset($banner->image) ? $banner->image : '' }}"
                                        onerror="this.src='{{ asset('images/default.png') }}'" alt=""
                                        width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
