@extends('frontend.goldevine.layouts.app')
@section('title')
    <title>GoldEvine Project</title>
@endsection
@section('content')
    <div class="inner-content mt-5 pt-5">
        <div class="wrap-parent-slider  mb-5 ">
            <div class="wrap">
                <div class="container">
                    <div class="slider-wrap ">
                        @foreach ($allprojects as $allproject)
                            <a class="item"
                                href="{{ route('projectDetail', ['id' => $allproject->id, 'slug' => $allproject->slug]) }}"
                                style="color: white">
                                <img src="{{ $allproject->feature_image }}"
                                    onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid" alt="">
                                <div class="card-item-text">
                                    <div class="txt-holder">
                                        <strong
                                            class="title text-center d-block mb-2">{{ Str::words($allproject->title, 7, '...') }}</strong>
                                        <div class="progress rounded-0 mb-1">
                                            <div class="progress-bar rounded-0" role="progressbar"
                                                style="width: {{ persentage($allproject->id) }}%" aria-valuenow="75"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>$ {{ number_format(totalamout($allproject->id)) }} raised</span>
                                            <span>{{ persentage($allproject->id) }}%</span>
                                        </div>
                                        <p class="mb-2">{{ number_format(donation($allproject->id)) }} donations</p>
                                        <p class="m-0">{!! Str::limit($allproject->short_description, 70, ' ...') !!}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>


            </div>
            <form class="page-form mx-auto mb-5 mt-5 pt-5" action="{{ route('projectsearch') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="page-form-holder d-flex">
                    <select class="form-control select-control border-0 rounded- flex-fill" name="searchFilter">
                        <option value="">Order by </option>
                        <option value="max">Funding Goal(max)</option>
                        <option value="min">Funding Goal(min)</option>
                    </select>
                    <div class="form-field d-flex flex-fill">
                        <input type="search" placeholder="Search..." class="border-0 bg-transparent flex-fill"
                            name="search">
                        <button type="submit" class="bg-transparent border-0 flex-fill"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="product-section project-page-mockup mb-4 pb-lg-3">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">Newest [Catogery] Projects</h2>
                <div class="d-flex form-holder">
                    <a class="btn btn-view rounded-0" href="{{ route('goldevineNewest') }}">View All</a>
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent goldeinefiltera"
                                    onchange="goldeinefilteras()">
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
                @foreach ($newprojects as $newproject)
                    <div>
                        <a href="{{ route('projectDetail', ['id' => $newproject->id, 'slug' => $newproject->slug]) }}">

                            <div class="product-item">
                                <div class="img-holder">
                                    <img src="{{ $newproject->feature_image }}"
                                        onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                </div>
                                <div class="txt-holder">
                                    <strong class="title text-center d-block mb-2">{!! Str::limit($newproject->title, 20, ' ...') !!}</strong>
                                    <div class="progress rounded-0 mb-1">
                                        <div class="progress-bar rounded-0" role="progressbar"
                                            style="width: {{ persentage($newproject->id) }}%" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>${{ number_format(totalamout($newproject->id)) }} raised</span>
                                        <span>{{ persentage($newproject->id) }} %</span>
                                    </div>
                                    <p class="mb-2">{{ number_format(donation($newproject->id)) }} donations</p>
                                    <p class="m-0">{!! Str::limit($newproject->short_description, 25, ' ...') !!}</p>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>

            <div class="slider123 gold-evine-slider classAppendgoldevine">
                <div class="filterGoldevines">

                </div>
            </div>


        </div>
    </div>
    <div class="product-section project-page-mockup mb-4 pb-lg-3">
        <div class="container">
            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                <h2 class="m-0">Trending [Catogery] Projects</h2>
                <div class="d-flex form-holder">
                    <a class="btn btn-view rounded-0" href="{{ route('goldevineTrendings') }}">View All</a>
                    <form class="page-form flex-fill" action="#">
                        <div class="page-form-holder d-flex">
                            <label class="form-control rounded-0">Search Filter</label>
                            <div class="form-field d-flex flex-fill">
                                <select class="flex-fill border-0 bg-transparent goldeinetrending"
                                    onchange="goldeinetrending()">
                                    <option>OrderBy</option>
                                    <option value="Raised(max)">Funding Goal(max)</option>
                                    <option value="Raised(min)">Funding Goal(min)</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="slider gold-evine-slider appendtrending">
                @foreach ($trandingProjects as $trendingproject)
                    <div>
                        <a
                            href="{{ route('projectDetail', ['id' => $trendingproject->id, 'slug' => $trendingproject->slug]) }}">

                            <div class="product-item">
                                <div class="img-holder">
                                    <img src="{{ $trendingproject->feature_image }}"
                                        onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                </div>
                                <div class="txt-holder">
                                    <strong class="title text-center d-block mb-2">{!! Str::limit($trendingproject->title, 20, ' ...') !!}</strong>
                                    <div class="progress rounded-0 mb-1">
                                        <div class="progress-bar rounded-0" role="progressbar"
                                            style="width: {{ persentage($trendingproject->id) }}%" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span> ${{ number_format(totalamout($trendingproject->id)) }} raised</span>
                                        <span>{{ persentage($trendingproject->id) }}%</span>
                                    </div>
                                    <p class="mb-2">{{ number_format(donation($trendingproject->id)) }} donations</p>
                                    <p class="m-0">{!! Str::limit($trendingproject->short_description, 20, ' ...') !!}</p>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>

            <div class="slider123 gold-evine-slider goldevinetrending">
                <div class="Goldevinestrending">

                </div>
            </div>
        </div>
        <div class="product-section gv-featured-projects project-page-mockup mb-5 pb-lg-2">
            <div class="container">
                <div class="product-header d-flex flex-column flex-lg-row justify-content-center mb-4">
                    <h2 class="m-1 text-white pt-4">Featured Projects</h2>
                </div>
                <div class="gv-featured-project-slider ">
                    @foreach ($featuredProjects as $featuredProject)
                        <div>
                            <a
                                href="{{ route('projectDetail', ['id' => $featuredProject->id, 'slug' => $featuredProject->slug]) }}">

                                <div class="product-item">
                                    <div class="img-holder">
                                        <img src="{{ $featuredProject->feature_image }}"
                                            onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                    </div>
                                    <div class="txt-holder">
                                        <p class="mb-2">
                                            <strong>{{ Str::words($featuredProject->title, 5, '...') }}</strong>
                                        </p>
                                        <p class="m-0">
                                            {{ Str::words($featuredProject->short_description, 18, '...') }}
                                        </p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="product-section project-page-mockup mb-4 pb-lg-3">
            <div class="container">
                <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                    <h2 class="m-0">Most Backed [Catogery] Projects</h2>
                    <div class="d-flex form-holder">
                        <a class="btn btn-view rounded-0" href="{{ route('goldevinemostbacked') }}">View All</a>
                        <form class="page-form flex-fill" action="#">
                            <div class="page-form-holder d-flex">
                                <label class="form-control rounded-0">Search Filter</label>
                                <div class="form-field d-flex flex-fill">
                                    <select class="flex-fill border-0 bg-transparent goldeinebackend"
                                        onchange="goldeinebackend()">
                                        <option>OrderBy</option>
                                        <option value="Raised(max)">Funding Goal(max)</option>
                                        <option value="Raised(min)">Funding Goal(min)</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="slider gold-evine-slider appendbackend">
                    @foreach ($trandingProjects as $trendingproject)
                        <div>
                            <a
                                href="{{ route('projectDetail', ['id' => $trendingproject->id, 'slug' => $trendingproject->slug]) }}">

                                <div class="product-item">
                                    <div class="img-holder">
                                        <img src="{{ $trendingproject->feature_image }}"
                                            onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                    </div>
                                    <div class="txt-holder">
                                        <strong class="title text-center d-block mb-2">{!! Str::limit($trendingproject->title, 10, ' ...') !!}</strong>
                                        <div class="progress rounded-0 mb-1">
                                            <div class="progress-bar rounded-0" role="progressbar"
                                                style="width:{{ persentage($trendingproject->id) }}%" aria-valuenow="75"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span>${{ number_format(totalamout($trendingproject->id)) }} raised</span>
                                            <span>{{ persentage($trendingproject->id) }}%</span>
                                        </div>
                                        <p class="mb-2">{{ number_format(donation($trendingproject->id)) }}
                                            donations
                                        </p>
                                        <p class="m-0">{!! Str::limit($trendingproject->short_description, 25, ' ...') !!}</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endforeach
                </div>
                <div class="slider123 gold-evine-slider goldevinebackend">
                    <div class="Goldevinesbackend">

                    </div>
                </div>
            </div>
            <div class="product-section project-page-mockup mb-4 pb-lg-3">
                <div class="container">
                    <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                        <h2 class="m-0">Nearly There Projects</h2>
                        <div class="d-flex form-holder">
                            <a class="btn btn-view rounded-0" href="{{ route('goldevinenearlys') }}">View All</a>
                            <form class="page-form flex-fill" action="#">
                                <div class="page-form-holder d-flex">
                                    <label class="form-control rounded-0">Search Filter</label>
                                    <div class="form-field d-flex flex-fill">
                                        <select class="flex-fill border-0 bg-transparent goldeinenearly"
                                            onchange="goldeinenearly()">
                                            <option>OrderBy</option>
                                            <option value="Raised(max)">Funding Goal(max)</option>
                                            <option value="Raised(min)">Funding Goal(min)</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="slider gold-evine-slider appendnearly">
                        @foreach ($nearlythereProjects as $nearlythereproject)
                            <div>
                                <a
                                    href="{{ route('projectDetail', ['id' => $nearlythereproject->id, 'slug' => $nearlythereproject->slug]) }}">

                                    <div class="product-item">
                                        <div class="img-holder">
                                            <img src="{{ $nearlythereproject->feature_image }}"
                                                onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                        </div>
                                        <div class="txt-holder">
                                            <strong
                                                class="title text-center d-block mb-2">{{ Str::words($nearlythereproject->title, 2, '...') }}</strong>
                                            <div class="progress rounded-0 mb-1">
                                                <div class="progress-bar rounded-0" role="progressbar"
                                                    style="width:{{ persentage($nearlythereproject->id) }}%"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>${{ number_format(totalamout($nearlythereproject->id)) }}
                                                    raised</span>
                                                <span>{{ persentage($nearlythereproject->id) }}%</span>
                                            </div>
                                            <p class="mb-2">{{ number_format(donation($nearlythereproject->id)) }}
                                                donations</p>
                                            <p class="m-0">
                                                {{ Str::words($nearlythereproject->short_description, 4, '...') }}</p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>
                    <div class="slider123 gold-evine-slider goldevinenearly">
                        <div class="Goldevinesnearly">

                        </div>
                    </div>
                </div>
            </div>
            <div class=" mb-5">
                <div class="container-fluid p-md-5">
                    <div class="col-md-10 mx-auto">
                        <div class="merchant-banner-text">
                            {{-- <h3>(Banner ad for Luxauro, Goledvine, or BMG; easily changeable by admin)</h3>
                                     --}}
                            <img src="{{ banner()->image ?? '' }}"
                                onerror="this.src='{{ asset('images/default.png') }}'" alt="" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


    <script>
        function goldeinetrending() {
            $('.Goldevinestrending').html('');
            let filter = $('.goldeinetrending').val();
            $.ajax({
                url: "{{ route('Goldevinetrending') }}",
                type: "GET",
                beforeSend: function() {
                    $('.appendtrending').html('');
                    if ($('.appendtrending').hasClass('slick-initialized')) {
                        $('.appendtrending').show();
                    } else {
                        $('.appendtrending').show();
                    }
                    $('.appendtrending').html(
                        '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                    );
                },
                data: {
                    filter: filter
                },
                success: function(data) {
                    if ($('.Goldevinestrending').hasClass('slick-initialized')) {
                        $('.Goldevinestrending').slick('unslick');
                        $('.Goldevinestrending').html('');
                        $('.appendtrending').html('');
                    } else {
                        $('.Goldevinestrending').html('');
                        $('.appendtrending').html('');
                    }
                    data.forEach(element => {
                        $('.Goldevinestrending').append(element);
                    });
                    // check if the element has a Slick slider initialized
                    if ($('.Goldevinestrending').hasClass('slick-initialized')) {
                        $('.Goldevinestrending').slick('unslick');
                    }
                    $('.Goldevinestrending').slick({
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
                    $('.appendtrending').hide();
                }
            });
        }

        function goldeinebackend() {
            let filter = $('.goldeinebackend').val();
            // alert(filter);
            // return false;
            $.ajax({
                url: "{{ route('goldevinebackeds') }}",
                type: "GET",
                data: {
                    filter: filter
                },
                beforeSend: function() {
                    $('.Goldevinesbackend').html('');
                    if ($('.appendbackend').hasClass('slick-initialized')) {
                        $('.appendbackend').show();
                    } else {
                        $('.appendbackend').show();
                    }
                    $('.appendbackend').html(
                        '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                    );
                },
                success: function(data) {
                    if ($('.Goldevinesbackend').hasClass('slick-initialized')) {
                        $('.Goldevinesbackend').slick('unslick');
                        $('.Goldevinesbackend').html('');
                        $('.appendbackend').html('');
                    } else {
                        $('.Goldevinesbackend').html('');
                        $('.appendbackend').html('');
                    }
                    data.forEach(element => {
                        $('.Goldevinesbackend').append(element);
                    });
                    // check if the element has a Slick slider initialized
                    if ($('.Goldevinesbackend').hasClass('slick-initialized')) {
                        $('.Goldevinesbackend').slick('unslick');
                    }
                    $('.Goldevinesbackend').slick({
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
                    $('.appendbackend').hide();
                }
            });

        }

        function goldeinenearly() {
            let filter = $('.goldeinenearly').val();
            // alert(filter);
            // return false;
            $.ajax({
                url: "{{ route('goldevinenearly') }}",
                type: "GET",
                data: {
                    filter: filter
                },
                beforeSend: function() {
                    $('.appendnearly').html('');
                    if ($('.appendnearly').hasClass('slick-initialized')) {
                        $('.appendnearly').show();
                    } else {
                        $('.appendnearly').show();
                    }
                    $('.appendnearly').html(
                        '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                    );
                },
                success: function(data) {
                    if ($('.Goldevinesnearly').hasClass('slick-initialized')) {
                        $('.Goldevinesnearly').slick('unslick');
                        $('.Goldevinesnearly').html('');
                        $('.appendnearly').html('');
                    } else {
                        $('.Goldevinesnearly').html('');
                        $('.appendnearly').html('');
                    }
                    $('.Goldevinesnearly').html('');
                    data.forEach(element => {
                        $('.Goldevinesnearly').append(element);
                    });
                    // check if the element has a Slick slider initialized
                    if ($('.Goldevinesnearly').hasClass('slick-initialized')) {
                        $('.Goldevinesnearly').slick('unslick');
                    }
                    $('.Goldevinesnearly').slick({
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
                    $('.appendnearly').hide();
                }
            });

        }
    </script>
    @include('frontend.include.script')
@endsection
