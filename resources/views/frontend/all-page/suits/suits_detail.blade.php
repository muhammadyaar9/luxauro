@extends('frontend.layouts.app')
@section('title')
    <title>All Suits</title>
@endsection
@section('content')
<script src="{{ asset('murchsnySuits/custom.js') }}"></script>
<link rel="stylesheet" href="{{ asset('murchsnySuits/ar-style.css') }}">
<link rel="stylesheet" href="{{ asset('murchsnySuits/style.css') }}">
    <div class="inner-content">
        <div class="merchant-section">
            <div class="container-fluid p-0">
                <div class="banner-images">
                    <img src="{{ $suits->store_header }}"   onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid h-100 w-100" style="object-fit: cover;">
                </div>
            </div>
        </div>
        <div class="merchant-section-inner mb-3">
            <div class="container">
                <div class="section-details py-5 px-3">
                    <div class="d-md-flex justify-content-between align-items-center flex-wrap">
                        <div class="logo-details d-flex align-items-center mb-2">
                            <div class="logo-section">
                                <img src="{{ $suits->business_logo }}" onerror="this.src='{{ asset('images/users.jfif') }}'" class="img-fluid">
                            </div>
                            <div class="logo-hold mx-3 ">
                                <strong class="title d-inline-block text-white pb-2">{{ $suits->business_name }}<i
                                        class="fa fa-globe px-2" aria-hidden="true"></i></strong>
                                <div class="details-review d-flex align-items-center text-white mb-2">
                                    <ul class="list-unstyled m-0 p-0 d-flex stars">
                                        <li class="me-1"><i class="fa fa-star"></i></li>
                                        <li class="me-1"><i class="fa fa-star"></i></li>
                                        <li class="me-1"><i class="fa fa-star"></i></li>
                                        <li class="me-1"><i class="fa fa-star"></i></li>
                                        <li class="me-1"><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span class="small mx-3">4.8 (52 Reviews)</span>
                                </div>
                                <div class="cart-icon text-white d-inline-block mb-2">
                                    <span class="first-child"><i class="fa fa-heart" aria-hidden="true"></i> 0</span>
                                    <span class="mx-2"><i class="fa fa-shopping-bag" aria-hidden="true"></i> 13</span>
                                    <span><i class="fa fa-globe px-2" aria-hidden="true"></i></span>
                                </div>

                            </div>
                        </div>
                        <div class="mb-0">
                            <strong class="title d-inline-block mb-3 border-bottom text-white">Social Icons</strong>
                            <ul class="list-unstyled m-0 p-0 d-flex align-items-center social-icons">
                                <li><a href="javascript:void"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="javascript:void"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="javascript:void"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="javascript:void"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="javascript:void"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="javascript:void"><i class="fa fa-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="merchant-section mb-4">
            <div class="merchant-suite-section">
                <div class="container">
                    <div class="about-section mb-4">
                        <h2 class="mb-1">About Us</h2>
                        <p class="mb-0">
                            {{ $suits->description_about_us }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="banner mb-4 py-3">
                <div class="banner-slider">
                    @forelse ( $featured as $featured_product )
                    <div>
                        <img src="{{ $featured_product->image }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid mb-5">
                        <div class="merchant-suite-section">
                            <div class="container">
                                <div class="owner-section mb-2 pb-lg-3">
                                    <h3 class="mb-1">{{ $featured_product->product_name }}</h3>
                                    <p class="mb-4">{{ $featured_product->product_description }}</p>
                                    {{-- <button class="btn btn-primary ">View your other story</button>
                                    <a href="#" class="d-inline-block mx-2 ">Lorem Ipsum</a> <a href="#"
                                        class="d-inline-block mx-1">Lorem Ipsum</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty

                    <div>
                    <p>
                        No data found
                    </p>
                    </div>
                    @endforelse
                </div>
            </div>
            <!-- <div class="merchant-suite-section">
                                <div class="container">
                                    <div class="owner-section mb-5 pb-lg-3">

                                        <h3 class="mb-1">[Featured Product Name]</h3>
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque assumenda magni odio expedita,
                                            tempore officiis culpa quia placeat nostrum illum
                                            numquam recusandae incidunt ipsum quod alias ullam nihil odio vel minima b
                                            eatae dignissimos, cupiditate repellendus reprehenderit saepe quod delectus.
                                            Expedita placeat labore quis reiciendis ad laudantium eos corrupti
                                            numquam recusandae incidunt ipsum quod alias ullam nihil odio vel minima b
                                            eatae dignissimos, cupiditate repellendus reprehenderit saepe!
                                        </p>
                                        <button class="btn btn-primary ">View your other story</button>
                                        <a href="#" class="d-inline-block mx-2 ">Lorem Ipsum</a>  <a href="#" class="d-inline-block mx-1">Lorem Ipsum</a>
                                    </div>
                                </div>
                            </div> -->
            <div class="product-section pb-lg-1">
                <div class="container">
                    <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                        <h2 class="m-0">Recommended for you</h2>
                        <div class="d-flex form-holder">
                            <a class="btn btn-view rounded-0" href="{{ route('allProducts') }}">View All</a>
                            <form class="page-form flex-fill" action="#">
                                <div class="page-form-holder d-flex">
                                    <label class="form-control rounded-0">Search Filter</label>
                                    <div class="form-field d-flex flex-fill">
                                        <select class="flex-fill border-0 bg-transparent recommendedfilter" name="filter">
                                            <option>OrderBy</option>
                                            <option value="max">Price(max)</option>
                                            <option value="min">Price(min)</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="slider Luxauro-fresh-slider product-detail-merchant deleterecmemendeddata">
                        @foreach ( $productsassending as $productsassendings )
                        <div>
                            <div class="product-item">
                                <a
                                    href="{{ route('productDetails', ['id' => $productsassendings->id, 'slug' => Str::slug($productsassendings->product_name)]) }}">
                                    <div class="img-holder">
                                        <img src="{{ $productsassendings->image }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                    </div>
                                </a>
                                <div class="txt-holder">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <a href="{{ route('productDetails', ['id' => $productsassendings->id, 'slug' => Str::slug($productsassendings->product_name)]) }}"
                                                style="color:black">
                                                <strong class="title">{{ $productsassendings->product_name }}</strong>
                                            </a>
                                            <ul class="list-unstyled m-0 p-0 d-flex stars">
                                                @php
                                                    $size = (int) $productsassendings->ratings()->avg('rating');
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
                                        <strong class="title">${{ $productsassendings->product_price }}</strong>
                                        <button class="btn bg-dark text-white py-1 px-2"
                                            onclick="addToCart('{{ $productsassendings->id }}', '{{ $productsassendings->product_name }}', '{{ $productsassendings->product_price }}')"><i
                                                class="fa fa-shopping-basket"></i>
                                        </button>
                                        <input type="hidden" name="" value="1" class="addOrRemove{{ $productsassendings->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="appendrecmended">

                    </div>
                </div>
            </div>
            <div class="merchant-suite-section py-2">
                <div class="container">
                    <div class="pagination justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                               {{ $productsassending->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- <div class="merchant-suite-section">
                <div class="container">
                    <div class="banner-slider-3 product-section">
                        <div><img src="images/charter-img.png" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid w-100"></div>
                        <div><img src="images/charter-img.png" class="img-fluid w-100" onerror="this.src='{{ asset('images/default.png') }}'"></div>
                        <div><img src="images/charter-img.png" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid w-100"></div>
                        <div><img src="images/charter-img.png" class="img-fluid w-100"></div>
                        <div><img src="images/charter-img.png" class="img-fluid w-100"></div>
                        <div><img src="images/charter-img.png" class="img-fluid w-100"></div>
                    </div>
                </div>
            </div>
            <div class="owner-section mb-5 pb-lg-3">
                <div class="container">
                    <h3 class="mb-1">[About Products]</h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque assumenda magni
                        odio expedita,
                        tempore officiis culpa quia placeat nostrum illum
                        numquam recusandae incidunt ipsum quod alias ullam nihil odio vel minima b
                        eatae dignissimos, cupiditate repellendus reprehenderit saepe quod delectus.
                        Expedita placeat labore quis reiciendis ad laudantium eos corrupti
                        numquam recusandae incidunt ipsum quod alias ullam nihil odio vel minima b
                        eatae dignissimos, cupiditate repellendus reprehenderit saepe!
                    </p>
                </div>
            </div> --}}
            <div class="product-section pb-lg-1 py-2">
                <div class="container">
                    <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                        <h2 class="m-0">Highest rated from [Suite Name]</h2>
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
                    <div class="slider Luxauro-fresh-slider product-detail-merchant nationshopdiv">
                        @forelse ($allSuits as $allSuit )
                        <div>
                            <div class="product-item">
                                <div class="img-holder">
                                    <img src="{{ $allSuit->business_logo  }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                </div>
                                <div class="txt-holder">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <strong class="title">{{ $allSuit->business_name }}</strong>
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
                                        <a class="btn bg-dark text-white py-1 px-2" href="javascript:void"><i
                                                class="fa fa-shopping-basket"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty

                        <p>
                            No Products Found
                        </p>

                        @endforelse
                    </div>
                    <div class="nationalShopFilter">

                    </div>
                </div>
            </div>
            <div class="merchant-suite-section">
                <div class="container">
                    <div class="pagination justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $allSuits->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.recommendedfilter').change(function (e) {
                e.preventDefault();
                var filter = $(this).val();
                var url = "{{ route('recommendedFilters') }}";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {filter:filter},
                    success: function (response) {
                        console.log(response);
                    $('.deleterecmemendeddata').html('');
                    if ($('.deleterecmemendeddata').hasClass('slick-initialized')) {
                        $('.deleterecmemendeddata').slick('unslick');
                        $('.deleterecmemendeddata').html('');
                    }
                    if ($('.appendrecmended').hasClass('slick-initialized')) {
                        $('.appendrecmended').slick('unslick');
                        $('.appendrecmended').html('');
                    }
                        $('.appendrecmended').html(response);
                        $('.appendrecmended').slick({
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
                    }
                });

            });
        });
    </script>
@endsection
