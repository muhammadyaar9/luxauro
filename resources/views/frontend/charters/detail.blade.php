@extends('frontend.layouts.app')

@section('title')
    <title>Charter Details</title>
@endsection
@section('content')
    <div class="inner-content">
        <div class="charter-detail-page mt-4 pt-md-5 mt-md-5 mb-3 mb-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-slider">
                            @foreach (json_decode($charter_detail->charter_agreement) as $image)
                                <div>
                                    <img src="{{ $image }}" onerror="this.src='{{ asset('images/default.png') }}'"
                                        class="img-fluid" style="width: 590px;height: 420px;">
                                </div>
                            @endforeach
                        </div>
                        <div class="detail-nav-slider">
                            @foreach (json_decode($charter_detail->charter_agreement) as $image)
                                <div>
                                    <img src="{{ $image }}" onerror="this.src='{{ asset('images/default.png') }}'"
                                        class="img-fluid" style="height: 22px;cursor: pointer;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="charter-detail-desc">
                            <h2>{{ $charter_detail->name }}</h2>
                            <div class="details-review d-flex align-items-center">
                                <ul class="list-unstyled m-0 p-0 d-flex stars">
                                    <li class="me-1"><i class="fa fa-star"></i></li>
                                    <li class="me-1"><i class="fa fa-star"></i></li>
                                    <li class="me-1"><i class="fa fa-star"></i></li>
                                    <li class="me-1"><i class="fa fa-star"></i></li>
                                    <li class="me-1"><i class="fa fa-star"></i></li>
                                </ul>
                                <span class="small">4.2 (Based on 16 Reviews)</span>
                            </div>
                            <p class="price my-2">{{ $charter_detail->rate }}/Hours</p>
                            <p>{!! $charter_detail->description !!}</p>
                            <form class="charter-desc-form" action="{{ route('charter_book') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="book_from">Book From</label>
                                        <div class="input-icon"><input type="date" name="book_from" placeholder=""
                                                class="form-control" required></div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="book_to">Book To</label>
                                        <div class="input-icon"><input type="date" name="book_to" placeholder=""
                                                class="form-control" required></div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="time_from">Time From</label>
                                        <div class="input-icon"><input type="time" name="time_from" placeholder=""
                                                class="form-control" required></div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="time_to">Time To</label>
                                        <div class="input-icon"><input type="time" name="time_to" placeholder=""
                                                class="form-control" required></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-5">
                                        <label for="">Number of Guests/Travelers</label>
                                        <select class="form-select" name="number_of_guest">
                                            <option value="">-Select-</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-7">
                                        <label for="" style="opacity: 0;">Number of Guests/Travelers</label>
                                        <div>
                                            <button type="submit" class="btn btn-primary">Book Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-section mb-5 pb-lg-3">
            <div class="container">
                <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                    <h2 class="m-0">Other charters in the area</h2>
                    <div class="d-flex form-holder">
                        <a class="btn btn-view rounded-0" href="{{ route('charters') }}">View All</a>
                        <form class="page-form flex-fill" action="#">
                            <div class="page-form-holder d-flex">
                                <label class="form-control rounded-0">Search Filter</label>
                                <div class="form-field d-flex flex-fill">
                                    <select class="flex-fill border-0 bg-transparent" onchange="charterAreaAppend(this)">
                                        <option>OrderBy</option>
                                        <option value="asc">price(min)</option>
                                        <option value="desc">price(max)</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="slider Charters-slider" id="charter-appendarea">
                    @foreach ($charters as $charter)
                        <div>
                            <a href="{{ route('charter_detail', ['id' => $charter->id]) }}" class="text-dark">
                                <div class="product-item">
                                    <div class="img-holder">
                                        <img src="{{ $charter->thumbnail_img }}" class="img-fluid"
                                            onerror="this.src='{{ asset('images/default.png') }}'">
                                    </div>
                                    <div class="txt-holder">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <strong class="title">{{ $charter->name }}</strong>
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
                                            <strong class="title">${{ $charter->rate }}</strong>
                                            <a class="btn bg-dark text-white py-1 px-2" href="javascript:void"><i
                                                    class="fa fa-shopping-basket"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="appendCharterarea">

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
                                    <img src="{{ isset($charter->charterSpecificationGeneral->first_image) ? $charter->charterSpecificationGeneral->first_image : '' }}"
                                        class="img-fluid w-100" onerror="this.src='{{ asset('images/default.png') }}'">
                                </div>
                                <div class="col-md-5 mb-3 mb-md-4">
                                    <p>
                                        {!! isset($charter->charterSpecificationGeneral->first_description)
                                            ? $charter->charterSpecificationGeneral->first_description
                                            : '' !!}

                                    </p>
                                </div>
                                <div class="col-md-5 mb-3 mb-md-4">
                                    <p>
                                        {!! isset($charter->charterSpecificationGeneral->second_description)
                                            ? $charter->charterSpecificationGeneral->second_description
                                            : '' !!}

                                    </p>
                                </div>
                                <div class="col-md-7 mb-3 mb-md-4">
                                    <img src="{{ isset($charter->charterSpecificationGeneral->second_image) ? $charter->charterSpecificationGeneral->second_image : '' }}"
                                        class="img-fluid w-100" onerror="this.src='{{ asset('images/default.png') }}'">
                                </div>
                                <div class="col-md-7 mb-3 mb-md-4">
                                    <img src="{{ isset($charter->charterSpecificationGeneral->third_image) ? $charter->charterSpecificationGeneral->third_image : '' }}"
                                        class="img-fluid w-100" onerror="this.src='{{ asset('images/default.png') }}'">
                                </div>
                                <div class="col-md-5 mb-3 mb-md-4">
                                    <p>
                                        {!! isset($charter->charterSpecificationGeneral->third_description)
                                            ? $charter->charterSpecificationGeneral->third_description
                                            : '' !!}
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
                                    <td>{{ isset($charter->charterSpecificationGeneral->model_series_name) ? $charter->charterSpecificationGeneral->model_series_name : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Model Number</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->model_number) ? $charter->charterSpecificationGeneral->model_number : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Primary Meterial</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->primary_meterial) ? $charter->charterSpecificationGeneral->primary_meterial : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Primary Meterial SubType</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->primary_meterial_subType) ? $charter->charterSpecificationGeneral->primary_meterial_subType : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Delivery Condition</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->delivery_condition) ? $charter->charterSpecificationGeneral->delivery_condition : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Suitable For</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->suitable_for) ? $charter->charterSpecificationGeneral->suitable_for : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Compatible Laptop Size</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->compatible_laptop_size) ? $charter->charterSpecificationGeneral->compatible_laptop_size : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foldable</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->foldable) ? $charter->charterSpecificationGeneral->foldable : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Adjustable Height</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->adjustable_height) ? $charter->charterSpecificationGeneral->adjustable_height : '' }}
                                    </td>
                                </tr>
                            </table>
                            <h4 class="mb-3"><strong>Demensions</strong></h4>
                            <table class="w-100">
                                <tr>
                                    <td>Width</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->width) ? $charter->charterSpecificationGeneral->width : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->height) ? $charter->charterSpecificationGeneral->height : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Depth</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->depth) ? $charter->charterSpecificationGeneral->depth : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Weight</td>
                                    <td>{{ isset($charter->charterSpecificationGeneral->weight) ? $charter->charterSpecificationGeneral->weight : '' }}
                                    </td>
                                </tr>
                            </table>
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
                    @foreach ($charters as $charter)
                        <div>
                            <a href="{{ route('charter_detail', ['id' => $charter->id]) }}" class="text-dark">
                                <div class="product-item">
                                    <div class="img-holder">
                                        <img src="{{ $charter->thumbnail_img }}" class="img-fluid"
                                            onerror="this.src='{{ asset('images/default.png') }}'">
                                    </div>
                                    <div class="txt-holder">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <strong class="title">{{ $charter->name }}</strong>
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
                                            <strong class="title">${{ $charter->rate }}</strong>
                                            <a class="btn bg-dark text-white py-1 px-2" href="javascript:void"><i
                                                    class="fa fa-shopping-basket"></i></a>
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


        <div class="reviews-ratings mb-3 mb-md-5">
            <div class="container">
                <h2 class="mb-4">Reviews & Ratings</h2>
                <img src="{{ asset('images/review-img.png') }}" class="img-fluid">
            </div>
        </div>

    </div>


    <script>
        function charterAreaAppend(selectObject) {
            var filterValue = selectObject.value;
        $.ajax({
            type: 'GET',
            url: "{{ route('appendarea') }}",
            beforeSend: function() {
                $('#charter-appendarea').html('');
                if ($('#charter-appendarea').hasClass('slick-initialized')) {
                    $('#charter-appendarea').html('');
                    $('.filterGoldevinesarea').html('');
                    $('#charter-appendarea').show();
                } else {
                    $('#charter-appendarea').show();
                }
                $('#charter-appendarea').html(
                    '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                );
            },
            data: {
                charter: filterValue
            },
            success: function(data) {
                if ($('.appendCharterarea').hasClass('slick-initialized')) {
                    $('.appendCharterarea').slick('unslick');
                    $('.appendCharterarea').html('');
                }
                $('.appendCharterarea').append(data);
                $('.appendCharterarea').slick({
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
                $('#charter-appendarea').hide();
            }
        });


        }
    </script>
@endsection
