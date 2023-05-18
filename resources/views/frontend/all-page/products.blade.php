@extends('frontend.layouts.app')
@section('title')
    <title>Home</title>
@endsection
@section('content')
    <style>
        .progress-bar {
            background: #5ce78c !important;
        }
    </style>
    <div class="banner mb-4">
        <div class="banner-slider">
            @foreach ( homeSlider() as $slider )
            <div>
                <img src="{{ $slider->image}}" class="img-fluid" onerror="this.src='{{asset('images/banner.png')}}'">
            </div>
            @endforeach
        </div>
    </div>

    <form class="page-form mx-auto mb-5 mt-5 pt-5" action="{{ route('searchFilters') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="page-form-holder d-flex">
            <select class="form-control select-control border-0 rounded- flex-fill" name="searchFilter">
                <option value="">Order by </option>
                <option value="max">Price(max)</option>
                <option value="min">Price(min)</option>
            </select>
            <div class="form-field d-flex flex-fill">
                <input type="search" placeholder="Search..." class="border-0 bg-transparent flex-fill" name="search">
                <button type="submit" class="bg-transparent border-0 flex-fill"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@php
    // session()->forget('temp_id');
@endphp
    <div class="product-section mb-4 mt-5 pt-2">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">Luxauro Global + National</h2>
                <div class="d-flex form-holder">
                    <!-- <a class="btn btn-view rounded-0" href="javascript:void">View All</a> -->
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent" onchange="appendCategories(this)">
                                    <option>OrderBy</option>
                                    <option value="desc">(Z-A)</option>
                                    <option value="asc">(A-Z)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row text-center" id="category-append">
                @foreach ($categories as $category)
                    <div class="col-6 col-md-4 col-lg-2 mb-4">
                        <div class="product-item">
                            <a href="{{ route('productcategory', ['id' => $category->id, 'slug' => Str::slug($category->title)]) }}"
                                style="color: #2e2c2c; text-decoration: none;">
                                <div class="img-holder">
                                    <img src="{{ isset($category->image) ? $category->image : asset('images/product-img.png') }}" class="img-fluid"
                                        alt="" onerror="this.src='{{ asset('images/default.png')  }}'">
                                </div>
                                <div class="txt-holder">
                                    <strong class="title">{{ $category->title }}</strong>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="product-section mb-5 pb-lg-3">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">My National Shops </h2>
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
                @forelse ($nationalshops as $nationalshop)
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
                <h2 class="m-0">Gold Evine</h2>
                <div class="d-flex form-holder">
                    <a class="btn btn-view rounded-0" href="{{ route('goldEvine') }}">View All</a>
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent goldeinefiltera"
                                    onchange="goldeinefilteras()" id="goldeinefilter">
                                    <option>OrderBy</option>
                                    <option value="Raised(max)">Funding Goal(max)</option>
                                    <option value="Raised(min)">Funding Goal(min)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="slider gold-evine-slider appendFilterData">
                @forelse ($goldevines as $goldevine)
                    @php
                        $total_amount = App\Models\Admin\Goldevine\GoldevineOrder::where('project_id', $goldevine->id)->sum('total_price');
                        $donations = App\Models\Admin\Goldevine\GoldevineOrder::where('project_id', $goldevine->id)->count();

                    @endphp
                    <div class="goldevineFilterAppend">
                        <a href="{{ route('projectDetail', ['id' => $goldevine->id, 'slug' => $goldevine->slug]) }}">
                            <div class="product-item">
                                <div class="img-holder">
                                    <img src="{{ $goldevine->feature_image }}"
                                        onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                </div>

                                <div class="txt-holder">
                                    <strong
                                        class="title text-center d-block mb-2">{{ Str::words($goldevine->title, 2, '...') }}</strong>
                                    <div class="progress rounded-0 mb-1">
                                        <div class="progress-bar rounded-0" role="progressbar"
                                            style="width:{{ persentage($goldevine->id) }}%" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>${{ number_format(totalamout($goldevine->id)) }} Raised</span>
                                        <span>{{ persentage($goldevine->id) }}%</span>
                                    </div>
                                    <p class="mb-2">{{ donation($goldevine->id) }} Donations</p>
                                    <p class="m-0">{{ Str::words($goldevine->short_description, 10, '...') }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="container">
                        No GoldEvine Project
                    </div>
                @endforelse
            </div>
            <div class="slider123 gold-evine-slider classAppendgoldevine">
                <div class="filterGoldevines">

                </div>
            </div>
        </div>
    </div>

    <div class="product-section mb-5 pb-lg-3">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">Gold Metal Guild</h2>(Not Fucational yet)
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
            <div class="slider gold-metal-slider text-center">
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="product-item">
                        <div class="img-holder">
                            <img src="images/user.png" class="img-fluid">
                        </div>
                        <div class="txt-holder">
                            <strong class="title">Jake Rage</strong>
                            <span class="d-block">IT Expert</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-section mb-5 pb-lg-3">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                {{-- {{ dd($ownluxauro) }} --}}
                <h2 class="m-0">My Own Luxauro</h2>
                <div class="d-flex form-holder">
                    <a class="btn btn-view rounded-0" href="{{ route('allOwner') }}">View All</a>
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent ownLuxauroFilter"
                                    onchange="ownLuxauro()">
                                    <option value="">OrderBy</option>
                                    <option value="max">price(max)</option>
                                    <option value="min">price(min)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="slider my-local-slider ownLuxauroFilters">
                @forelse ($ownluxauros as $ownluxauro)
                    @if ($ownluxauro->user->role == 'Admin')
                        <div>
                            <div class="product-item">
                                <a
                                    href="{{ route('productDetails', ['id' => $ownluxauro->id, 'slug' => Str::slug($ownluxauro->product_name)]) }}">
                                    <div class="img-holder">
                                        <img src="{{ $ownluxauro->image }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                    </div>
                                </a>
                                <div class="txt-holder">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <a href="{{ route('productDetails', ['id' => $ownluxauro->id, 'slug' => Str::slug($ownluxauro->product_name)]) }}"
                                                style="color:black">
                                                <strong class="title">{{ $ownluxauro->product_name }}</strong>
                                            </a>
                                            <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                @php
                                                    $size = (int) $ownluxauro->ratings()->avg('rating');
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
                                        <strong class="title">${{ $ownluxauro->product_price }}</strong>
                                        <button class="btn bg-dark text-white py-1 px-2"
                                            onclick="addToCart('{{ $ownluxauro->id }}', '{{ $ownluxauro->product_name }}', '{{ $ownluxauro->product_price }}')"><i
                                                class="fa fa-shopping-basket"></i>
                                        </button>
                                        <input type="hidden" value="1" class="addOrRemove{{ $ownluxauro->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="text-center">
                        <h3>No Product Found</h3>
                    </div>
                @endforelse
            </div>
            <div class="appendownLuxauroproduct">
                <div class="slidersOwnProducts">

                </div>

            </div>
        </div>
    </div>

    <div class="product-section mb-5 pb-lg-3">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">Luxauro Charters</h2>
                <div class="d-flex form-holder">
                    <a class="btn btn-view rounded-0" href="{{ route('charters') }}">View All</a>
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent" onchange="appendCharters(this)">
                                    <option>OrderBy</option>
                                    <option value="asc">price(min)</option>
                                    <option value="desc">price(max)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="slider Charters-slider" id="charter-append">
                @foreach ($luxauro_charters as $charter)
                    <div>
                        <a href="{{ route('charter_detail', ['id' => $charter->id]) }}" class="text-dark">
                            <div class="product-item">
                                <div class="img-holder">
                                    <img src="{{ $charter->thumbnail_img }}"
                                        onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                </div>
                                <div class="txt-holder">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <strong class="title">{{ $charter->name }}</strong>
                                            <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                <li class="me-1"><i class="bi bi-star"></i></li>
                                                <li class="me-1"><i class="bi bi-star"></i></li>
                                                <li class="me-1"><i class="bi bi-star"></i></li>
                                                <li class="me-1"><i class="bi bi-star"></i></li>
                                                <li class="me-1"><i class="bi bi-star"></i></li>
                                            </ul>
                                        </div>
                                        <i class="fa fa-globe fa-1x mt-2"></i>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong class="title">${{ $charter->rate }}</strong>
                                        <a class="btn bg-dark text-white py-1 px-2"
                                            href="{{ route('charter_detail', ['id' => $charter->id]) }}"><i
                                                class="fa fa-shopping-basket"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>

            <div class="appendCharter">

            </div>
        </div>
    </div>

    <div class=" mb-5">
        <div class="container-fluid p-md-5">
            <div class="col-md-10 mx-auto">
                <div class="merchant-banner-text">
                    {{-- <h3>(Banner ad for Luxauro, Goledvine, or BMG; easily changeable by admin)</h3>
                         --}}
                    <img src="{{ banner()->image ?? '' }}" onerror="this.src='{{ asset('images/default.png') }}'"
                        alt="" width="100%">
                </div>
            </div>
        </div>
    </div>

    <div class="container product-section mb-5 pb-lg-3">
        @foreach ($categories as $category)
            @if ($category->title == 'Luxaurolicious' || $category->title == 'Luxauro Fresh')
                <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                    <h2 class="m-0">{{ $category->title }}</h2>
                    <div class="d-flex form-holder">
                        <a class="btn btn-view rounded-0"
                            href="{{ route('productcategory', ['id' => $category->id, 'slug' => Str::slug($category->title)]) }}">View
                            All</a>
                        <form class="page-form flex-fill" action="#">
                            <div class="page-form-holder d-flex">
                                <label class="form-control rounded-0">Search Filter</label>
                                <div class="form-field d-flex flex-fill">
                                    <select class="flex-fill border-0 bg-transparent" onchange="appendProducts(this)">
                                        <option>OrderBy</option>
                                        <option value="desc{{ $category->id }}">price(max)</option>
                                        <option value="asc{{ $category->id }}">price(min)</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="slider Luxauro-library-slider" id="product-append{{ $category->id }}">
                    @php
                        $categores = $category->products->where('status', 'Active');
                    @endphp
                    @foreach ($categores as $product)
                        <div>
                            <div class="product-item" style="margin: 0 12px;">
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
                                            <a
                                                href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}">
                                                <strong class="title"
                                                    style="color:black">{{ $product->product_name }}</strong>
                                            </a>
                                            <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                @php
                                                    $size = (int) $product->ratings()->avg('rating');
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
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <strong class="title">${{ $product->product_price }}</strong>
                                        <button class="btn bg-dark text-white py-1 px-2"
                                            onclick="addToCart('{{ $product->id }}', '{{ $product->product_name }}', '{{ $product->product_price }}')"><i
                                                class="fa fa-shopping-basket"></i>
                                        </button>
                                        <input type="hidden" name="" value="1" class="addOrRemove{{ $product->id  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach

        <div class="product-section mb-5 pb-lg-3">
            <div class="container">
                <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                    <h2 class="m-0">Luxauro Library, Forum, & Publishing</h2>
                    <div class="d-flex form-holder">
                        <a class="btn btn-view rounded-0" href="{{ route('forumPublishing') }}">View All</a>
                        <form class="page-form flex-fill" action="#">
                            <div class="page-form-holder d-flex">
                                <label class="form-control rounded-0">Search Filter</label>
                                <div class="form-field d-flex flex-fill">
                                    <select class="flex-fill border-0 bg-transparent luxauroLibrary"
                                        onchange="luxauroLibrary()">
                                        <option>OrderBy</option>
                                        <option value="max">price(max)</option>
                                        <option value="min">price(min)</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="slider Luxauro-library-slider luxauroLibraryFilters">
                    @php
                        $displayedProducts = []; // create an empty array to store displayed product IDs
                    @endphp
                    @forelse ($luxauroLibrarys as $luxauroLibrary)
                        @foreach ($luxauroLibrary->categories as $category)
                            @if ($category->title == 'Publishing' || $category->title == 'Forum' || $category->title == 'Luxauro Library')
                                @if (!in_array($luxauroLibrary->id, $displayedProducts))
                                    <div>
                                        <div class="product-item">
                                            <a
                                                href="{{ route('productDetails', ['id' => $luxauroLibrary->id, 'slug' => Str::slug($luxauroLibrary->product_name)]) }}">
                                                <div class="img-holder">
                                                    <img src="{{ $luxauroLibrary->image }}"
                                                        onerror="this.src='{{ asset('images/default.png') }}'"
                                                        class="img-fluid">
                                                </div>
                                            </a>
                                            <div class="txt-holder">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div>
                                                        <a
                                                            href="{{ route('productDetails', ['id' => $luxauroLibrary->id, 'slug' => Str::slug($luxauroLibrary->product_name)]) }}">
                                                            <strong class="title"
                                                                style="color:black">{{ $luxauroLibrary->product_name }}</strong>
                                                        </a>
                                                        <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                            @php
                                                                $size = (int) $luxauroLibrary->ratings()->avg('rating');
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
                                                    <strong class="title">${{ $luxauroLibrary->product_price }}</strong>
                                                    <button class="btn bg-dark text-white py-1 px-2"
                                                        onclick="addToCart('{{ $luxauroLibrary->id }}', '{{ $luxauroLibrary->product_name }}', '{{ $luxauroLibrary->product_price }}')"><i
                                                            class="fa fa-shopping-basket"></i>
                                                    </button>
                                                    <input type="hidden" name="" value="1" class="addOrRemove{{ $luxauroLibrary->id  }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        array_push($displayedProducts, $luxauroLibrary->id); // add the displayed product ID to the array
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    @empty

                        <div>
                            <p>
                                No Product Found
                            </p>
                        </div>
                    @endforelse
                </div>
                <div class="appendluxauroLibraryproduct">

                </div>
            </div>
        </div>
        <div class="product-section mb-5 pb-lg-3">
            <div class="container">
                <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                    <h2 class="m-0">Luxauro Street, Vintage & Antique Market</h2>
                    <div class="d-flex form-holder">
                        <a class="btn btn-view rounded-0" href="{{ route('luxaurostreet') }}">View All</a>
                        <form class="page-form flex-fill" action="#">
                            <div class="page-form-holder d-flex">
                                <label class="form-control rounded-0">Search Filter</label>
                                <div class="form-field d-flex flex-fill">
                                    <select class="flex-fill border-0 bg-transparent luxauroStreet"
                                        onchange="luxauroStreet()">
                                        <option>OrderBy</option>
                                        <option value="max">price(max)</option>
                                        <option value="min">price(min)</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="slider Luxauro-library-slider luxaurostreetFilter">
                    @php
                        $displayedProducts = []; // create an empty array to store displayed product IDs
                    @endphp
                    @forelse ($luxauroLibrarys as $luxauroLibrary)
                        @foreach ($luxauroLibrary->categories as $category)
                            @if ($category->title == 'Antique Market' || $category->title == 'Vintage' || $category->title == 'Luxauro Stree')
                                @if (!in_array($luxauroLibrary->id, $displayedProducts))
                                    <div>
                                        <div class="product-item">
                                            <a
                                                href="{{ route('productDetails', ['id' => $luxauroLibrary->id, 'slug' => Str::slug($luxauroLibrary->product_name)]) }}">
                                                <div class="img-holder">
                                                    <img src="{{ $luxauroLibrary->image }}"
                                                        onerror="this.src='{{ asset('images/default.png') }}'"
                                                        class="img-fluid">
                                                </div>
                                            </a>
                                            <div class="txt-holder">
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div>
                                                        <a
                                                            href="{{ route('productDetails', ['id' => $luxauroLibrary->id, 'slug' => Str::slug($luxauroLibrary->product_name)]) }}">
                                                            <strong class="title"
                                                                style="color:black">{{ $luxauroLibrary->product_name }}</strong>
                                                        </a>
                                                        <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                            @php
                                                                $size = (int) $luxauroLibrary->ratings()->avg('rating');
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
                                                    <strong class="title">${{ $luxauroLibrary->product_price }}</strong>
                                                    <button class="btn bg-dark text-white py-1 px-2"
                                                        onclick="addToCart('{{ $luxauroLibrary->id }}', '{{ $luxauroLibrary->product_name }}', '{{ $luxauroLibrary->product_price }}')"><i
                                                            class="fa fa-shopping-basket"></i>
                                                    </button>
                                                    <input type="hidden" name="" value="1" class="addOrRemove{{ $luxauroLibrary->id  }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        array_push($displayedProducts, $luxauroLibrary->id); // add the displayed product ID to the array
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    @empty

                        <div>
                            <p>
                                No Product Found
                            </p>
                        </div>
                    @endforelse
                </div>

                <div class="appendluxaurostreetproduct">

                </div>
            </div>
        </div>

        <div class=" mb-5">
            <div class="container-fluid p-md-5">
                <div class="col-md-10 mx-auto">
                    <div class="merchant-banner-text">
                        {{-- <h3>(Banner ad for Luxauro, Goledvine, or BMG; easily changeable by admin)</h3>
                             --}}
                        <img src="{{ banner()->image ?? '' }}" onerror="this.src='{{ asset('images/default.png') }}'"
                            alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>


        <script>
            function ownLuxauro() {
                let ownluxauro = $('.ownLuxauroFilter').val();
                $.ajax({
                    url: "{{ route('ownLuxaurofilter') }}",
                    type: "GET",
                    beforeSend: function() {
                        $('.ownLuxauroFilters').html('');
                        if ($('.ownLuxauroFilters').hasClass('slick-initialized')) {
                            $('.ownLuxauroFilters').html('');
                            $('.appendownLuxauroproduct').html('');
                            $('.ownLuxauroFilters').show();
                        } else {
                            $('.ownLuxauroFilters').show();
                        }
                        $('.ownLuxauroFilters').html(
                            '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                        );
                    },
                    data: {
                        ownluxauro: ownluxauro
                    },
                    success: function(data) {
                        // check if the element has a Slick slider initialized
                        if ($('.appendownLuxauroproduct').hasClass('slick-initialized')) {
                            $('.appendownLuxauroproduct').slick('unslick');
                            $('.appendownLuxauroproduct').html('');
                        }
                        $('.ownLuxauroFilters').html('');
                        $('.appendownLuxauroproduct').append(data);
                        $('.appendownLuxauroproduct').slick({
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                            arrows: true,
                            focusOnSelect: true,
                            autoplay: false,
                            mobileFirst: true,
                            prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
                            nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
                            responsive: [{
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 4,
                                    slidesToScroll: 1,
                                }
                            }, {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 6,
                                    slidesToScroll: 1,
                                }
                            }]
                        });
                    },
                    complete: function() {
                        $('.ownLuxauroFilters').hide();
                    }
                });
            }

            function luxauroLibrary() {
                let luxauroLibrary = $('.luxauroLibrary').val();
                $.ajax({
                    url: "{{ route('forumFilter') }}",
                    type: "GET",
                    beforeSend: function() {
                        $('.luxauroLibraryFilters').html('');
                        if ($('.luxauroLibraryFilters').hasClass('slick-initialized')) {
                            $('.luxauroLibraryFilters').html('');
                            $('.appendluxauroLibraryproduct').html('');
                            $('.luxauroLibraryFilters').show();
                        } else {
                            $('.luxauroLibraryFilters').show();
                        }
                        $('.luxauroLibraryFilters').html(
                            '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                        );
                    },
                    data: {
                        searchFilter: luxauroLibrary
                    },
                    success: function(data) {
                        if ($('.appendluxauroLibraryproduct').hasClass('slick-initialized')) {
                            $('.appendluxauroLibraryproduct').slick('unslick');
                            $('.appendluxauroLibraryproduct').html('');
                        }
                        $('.luxauroLibraryFilters').html('');
                        $('.appendluxauroLibraryproduct').append(data);
                        $('.appendluxauroLibraryproduct').slick({
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                            arrows: true,
                            focusOnSelect: true,
                            autoplay: false,
                            mobileFirst: true,
                            prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
                            nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
                            responsive: [{
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 4,
                                    slidesToScroll: 1,
                                }
                            }, {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 6,
                                    slidesToScroll: 1,
                                }
                            }]
                        });
                    },
                    complete: function() {
                        $('.luxauroLibraryFilters').hide();
                    }
                });
            }

            function luxauroStreet() {
                let luxauroStreet = $('.luxauroStreet').val();
                $.ajax({
                    url: "{{ route('streetFilter') }}",
                    type: "GET",
                    beforeSend: function() {
                        $('.luxaurostreetFilter').html('');
                        if ($('.luxaurostreetFilter').hasClass('slick-initialized')) {
                            $('.luxaurostreetFilter').html('');
                            $('.appendluxaurostreetproduct').html('');
                            $('.luxaurostreetFilter').show();
                        } else {
                            $('.luxaurostreetFilter').show();
                        }
                        $('.luxaurostreetFilter').html(
                            '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                        );
                    },
                    data: {
                        searchFilter: luxauroStreet
                    },
                    success: function(data) {
                        if ($('.appendluxaurostreetproduct').hasClass('slick-initialized')) {
                            $('.appendluxaurostreetproduct').slick('unslick');
                            $('.appendluxaurostreetproduct').html('');
                        }
                        $('.luxaurostreetFilter').html('');
                        $('.appendluxaurostreetproduct').append(data);
                        $('.appendluxaurostreetproduct').slick({
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false,
                            arrows: true,
                            focusOnSelect: true,
                            autoplay: false,
                            mobileFirst: true,
                            prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
                            nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
                            responsive: [{
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 4,
                                    slidesToScroll: 1,
                                }
                            }, {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 6,
                                    slidesToScroll: 1,
                                }
                            }]
                        });
                    },
                    complete: function() {
                        $('.luxaurostreetFilter').hide();
                    }
                });

            }


        </script>
    @endsection
