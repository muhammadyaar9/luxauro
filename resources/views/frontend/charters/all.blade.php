@extends('frontend.layouts.app')
@section('title')
<title>Charters</title>
@endsection
@section('content')
<div class="inner-content">
    <div class="product-page-section">
        <div class="col-12 col-md-10 mx-auto">
            <div class="product-section mb-5 pb-lg-3">
                <div class="container">
                    <div class="d-md-flex justify-content-between align-items-center flex-wrap mb-3">
                        <div class="mb-3 mb-md-0">
                            <ol class="breadcrumb mb-1">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Charters</li>
                            </ol>
                            <h2>
                        </div>

                        <div class="mb-3 mb-md-0">
                            <h2 style="font-size: 20px;">Charters</h2>
                            <form class="form-inline">
                                <div class="d-flex align-items-center justify-content-end">
                                    <!-- <label>Result per page</label> -->
                                    <span>Page {{ $charters->currentPage() }} of {{ $charters->lastPage() }}</span>
                                    <select onchange="window.location.href = this.value" class="form-select ms-3" id="pagination" aria-label="Default select example" style="width: 75px;">
                                        @for ($i = 1; $i <= $charters->lastPage(); $i++)
                                            <option value="{{ $charters->url($i) }}" {{ ($charters->currentPage() == $i) ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                            @endfor
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="Luxaurolicious-slider ">

                        <div class="row mb-3">
                            @foreach ($charters as $charter)
                            <div class="col-md-auto col-12">
                                <div class="product-item">
                                    <a href="{{route('charter_detail',['id'=>$charter->id])}}">
                                        <div class="img-holder">
                                            <!-- <img src="{{ asset('frontend/images/product-img.png') }}" class="img-fluid"> -->
                                            <img src="{{ $charter->thumbnail_img }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                                        </div>
                                    </a>
                                    <div class="txt-holder">
                                        <div class="d-flex justify-content-between mb-3">
                                            <div>
                                                <!-- <strong class="title">Lorem Ipsum</strong> -->
                                                <strong class="title">{{ $charter->charter_name }}</strong>
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
                                            <!-- <strong class="title">$24.23</strong> -->
                                            <strong class="title">${{ $charter->rate }}</strong>
                                            <a class="btn bg-dark text-white py-1 px-2" href="{{route('charter_detail',['id'=>$charter->id])}}"><i class="fa fa-shopping-basket"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">

                        <ul class="pagination justify-content-center">
                            {{ $charters->links() }}

                        </ul>
                    </nav>
                    <div class="merchant-banners mb-4">
                        <div class="container-fluid p-5">
                            <div class="col-md-10 mx-auto">
                                <div class="merchant-banner-text">
                                    <h3>(Banner ad for Luxauro, Goledvine, or BNMG)</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-section mb-5 pb-lg-3">
                        <div class="container">
                            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                                <h2 class="m-0">Related items</h2>
                                <div class="d-flex form-holder">
                                    {{-- <a class="btn btn-view rounded-0" href="javascript:void">View All</a> --}}
                                    <form class="page-form flex-fill" action="#">
                                        <div class="page-form-holder d-flex">
                                            <label class="form-control rounded-0">Search Filter</label>
                                            <div class="form-field d-flex flex-fill">
                                                <select class="flex-fill border-0 bg-transparent" id="price-filter" onchange="appendCharters(this)">
                                                    <option>OrderBy</option>
                                                    <option value="desc">price(max)</option>
                                                    <option value="asc">price(min)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="slider Luxauro-fresh-slider product-detail-merchant" id="charter-append">
                                @foreach ($charters as $charter)
                                <div>
                                    <a href="{{route('charter_detail',['id'=>$charter->id])}}">
                                        <div class="product-item">
                                            <div class="img-holder">
                                                <img src="{{ $charter->thumbnail_img }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
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
                                                    <a class="btn bg-dark text-white py-1 px-2" href="javascript:void"><i class="fa fa-shopping-basket"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="product-section mb-5 pb-lg-3">
                        <div class="container">
                            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                                <h2 class="m-0">You may also like</h2>
                                {{-- <div class="d-flex form-holder">
                                    <a class="btn btn-view rounded-0" href="javascript:void">View All</a>
                                    <form class="page-form flex-fill" action="#">
                                        <div class="page-form-holder d-flex">
                                            <label class="form-control rounded-0">Search Filter</label>
                                            <div class="form-field d-flex flex-fill">
                                            <select class="flex-fill border-0 bg-transparent" onchange="appendCharters(this)">
                                                <option>OrderBy</option>
                                                <option value="desc">price(max)</option>
                                                <option value="asc">price(min)</option>
                                            </select>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                            <div class="slider Luxauro-fresh-slider product-detail-merchant" >
                               @foreach ($charters as $charter)
                                <div>
                                    <a href="{{route('charter_detail',['id'=>$charter->id])}}">
                                        <div class="product-item">
                                            <div class="img-holder">
                                                <img src="{{ $charter->thumbnail_img }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
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
                                                    <a class="btn bg-dark text-white py-1 px-2" href="javascript:void"><i class="fa fa-shopping-basket"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="merchant-banners mb-4">
                        <div class="container-fluid p-5">
                            <div class="col-md-10 mx-auto">
                                <div class="merchant-banner-text">
                                    <h3>(Banner ad for Luxauro, Goledvine, or BNMG)</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
