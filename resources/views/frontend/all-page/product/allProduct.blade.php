@extends('frontend.layouts.app')
@section('title')
    <title>All Products</title>
@endsection
@section('content')
    <div class="inner-content mt-4">
        <div class="product-page-section">
            <div class="col-12 col-md-10 mx-auto">
                <div class="product-section mb-5 pb-lg-3">
                    <div class="container mt-3">
                        <div class="d-md-flex justify-content-between align-items-center flex-wrap mb-3">
                            <div class="mb-3 mb-md-0">
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Products
                                    </li>
                                </ol>
                            </div>
                            <div class="mb-3 mb-md-0">
                                <h2 style="font-size: 20px;">Search results - {{ count($products) }} </h2>
                                <div class="d-flex align-items-center justify-content-end">
                                    <label>Result per page</label>
                                    <select id="pagination" onchange="changePagination(this.value)" class="form-select ms-3"
                                        aria-label="Default select example" style="width: 75px;">
                                        <option value="" selected>-Select-</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <form class="page-form mx-auto mb-5 mt-5 pt-5 py-5" action="{{ route('searchFilters') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="page-form-holder d-flex">
                                <select class="form-control select-control border-0 rounded- flex-fill" name="searchFilter">
                                    <option value="">Order by </option>
                                    <option value="max">Price(max)</option>
                                    <option value="min">Price(min)</option>
                                </select>
                                <div class="form-field d-flex flex-fill">
                                    <input type="search" placeholder="Search..." class="border-0 bg-transparent flex-fill"
                                        name="search">
                                    <button type="submit" class="bg-transparent border-0 flex-fill"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="Luxaurolicious-slider ">
                            <div class="row mb-3">
                                @foreach ($products as $product)
                                    <div class="col-md-3  col-12 my-2">
                                        <div class="product-item">
                                            <a
                                                href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}">

                                                <div class="img-holder">
                                                    <img src="{{ $product->image }}"
                                                        onerror="this.src='{{ asset('images/default.png') }}'"
                                                        class="img-fluid">
                                                </div>
                                            </a>
                                            <div class="txt-holder">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div>
                                                        <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}"
                                                            class="text-dark">
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
                                                            class="fa fa-shopping-basket"></i></button>
                                                </div>
                                                <input type="hidden" name="" value="1"
                                                    class="addOrRemove{{ $product->id }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            {!! $products->appends(Request::all())->links() !!}
                        </div>
                        <div class=" mb-4">
                            <div class="container-fluid p-5">
                                <div class="col-md-10 mx-auto">
                                    <div class="merchant-banner-text">
                                        <img src="{{ isset(banner()->image) ? banner()->image : '' }}"
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
                                        <a class="btn btn-view rounded-0" href="{{ route('allProducts') }}">View All</a>
                                        <form class="page-form flex-fill" action="#">
                                            <div class="page-form-holder d-flex">
                                                <label class="form-control rounded-0">Search Filter</label>
                                                <div class="form-field d-flex flex-fill">
                                                    <select class="flex-fill border-0 bg-transparent">
                                                        <option>-Select-</option>
                                                        <option value="desc">Price (max)</option>
                                                        <option class="asc">Price (min)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="slider Luxauro-fresh-slider product-detail-merchant">
                                    @foreach ($productsassending as $productassending)
                                        <div>
                                            <div class="product-item">
                                                <a
                                                    href="{{ route('productDetails', ['id' => $productassending->id, 'slug' => Str::slug($productassending->product_name)]) }}">
                                                    <div class="img-holder">
                                                        <img src="{{ $productassending->image }}"
                                                            onerror="this.src='{{ asset('images/default.png') }}'"
                                                            class="img-fluid">
                                                    </div>
                                                </a>
                                                <div class="txt-holder">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <a href="{{ route('productDetails', ['id' => $productassending->id, 'slug' => Str::slug($productassending->product_name)]) }}"
                                                                class="text-dark">
                                                                <strong
                                                                    class="title">{{ $productassending->product_name }}</strong>
                                                            </a>
                                                            <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                                @php
                                                                    $size = (int) $productassending->ratings()->avg('rating');
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
                                                        <strong
                                                            class="title">${{ $productassending->product_price }}</strong>
                                                        <button class="btn bg-dark text-white py-1 px-2"
                                                            onclick="addToCart('{{ $productassending->id }}', '{{ $productassending->product_name }}', '{{ $productassending->product_price }}')"><i
                                                                class="fa fa-shopping-basket"></i></button>
                                                    </div>
                                                    <input type="hidden" name="" value="1"
                                                        class="addOrRemove{{ $productassending->id }}">
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
                                        <a class="btn btn-view rounded-0" href="{{ route('allProducts') }}">View All</a>
                                        <form class="page-form flex-fill" action="#">
                                            <div class="page-form-holder d-flex">
                                                <label class="form-control rounded-0">Search Filter</label>
                                                <div class="form-field d-flex flex-fill">
                                                    <select class="flex-fill border-0 bg-transparent">
                                                        <option>-Select-</option>
                                                        <option value="desc">Price (max)</option>
                                                        <option class="asc">Price (min)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="slider Luxauro-fresh-slider product-detail-merchant">
                                    @foreach ($productsdesending as $productdesending)
                                        <div>
                                            <div class="product-item">
                                                <a
                                                    href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}">
                                                    <div class="img-holder">
                                                        <img src="{{ $productdesending->image }}"
                                                            onerror="this.src='{{ asset('images/default.png') }}'"
                                                            class="img-fluid">
                                                    </div>
                                                </a>
                                                <div class="txt-holder">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div>
                                                            <a href="{{ route('productDetails', ['id' => $productdesending->id, 'slug' => Str::slug($productdesending->product_name)]) }}"
                                                                class="text-dark">
                                                                <strong
                                                                    class="title">{{ $productdesending->product_name }}</strong>
                                                            </a>
                                                            <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                                @php
                                                                    $size = (int) $productdesending->ratings()->avg('rating');
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
                                                        <strong
                                                            class="title">${{ $productdesending->product_price }}</strong>
                                                        <button class="btn bg-dark text-white py-1 px-2"
                                                            onclick="addToCart('{{ $productdesending->id }}', '{{ $productdesending->product_name }}', '{{ $productdesending->product_price }}')"><i
                                                                class="fa fa-shopping-basket"></i></button>
                                                        <input type="hidden" name="" value="1"
                                                            class="addOrRemove{{ $productdesending->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class=" mb-4">
                                <div class="container-fluid p-5">
                                    <div class="col-md-10 mx-auto">
                                        <div class="merchant-banner-text">
                                            <img src="{{ isset(banner()->image) ? banner()->image : '' }}"
                                                onerror="this.src='{{ asset('images/default.png') }}'" alt=""
                                                width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript to handle pagination change -->
        <script>
            function changePagination(value) {
                window.location.href = "{{ route('allProducts') }}?perPage=" + value;
            }
        </script>
    @endsection
