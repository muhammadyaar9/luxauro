@extends('frontend.layouts.app')
@section('title')
    <title>
        Product Search
    </title>
@endsection
@section('content')
    <style>
        .progress-bar {
            background: #5ce78c !important;
        }
    </style>
    <div class="inner-content mt-5 pt-3">
        <div class="product-page-section">
            <div class="col-12 col-md-10 mx-auto">
                <div class="product-section mb-5 pb-lg-3">
                    <div class="container">
                        <div class="d-md-flex justify-content-between align-items-center flex-wrap mb-3">
                            <div class="mb-3 mb-md-0">
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home </a></li>
                                    / Search results - ( {{ $projectsearches->count() }} )
                                    <li class="breadcrumb-item active" aria-current="page">

                                </ol>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="Luxaurolicious-slider ">
                        <div class="row mb-3">

                            @foreach ($projectsearches as $product)
                                <div class="col-md-2  col-12 my-2">
                                    <div class="product-item">
                                        <a
                                            href="{{ route('productDetails', ['id' => $product->id, 'slug' => Str::slug($product->product_name)]) }}">
                                            <div class="img-holder">
                                                <img src="{{ $product->image }}"
                                                    onerror="this.src'{{ asset('images/default.png') }}'" class="img-fluid">
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
                                                <strong class="title">${{ $product->product_price }}</strong>
                                                <button class="btn bg-dark text-white py-1 px-2"
                                                    onclick="addToCart('{{ $product->id }}', '{{ $product->product_name }}', '{{ $product->product_price }}')"><i
                                                        class="fa fa-shopping-basket"></i>

                                                </button>
                                                <input type="hidden" name="" value="1" class="addOrRemove">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}

                    <div class="product-section mb-5 pb-lg-3">
                        <div class="container">
                            <div class="product-header d-flex flex-column flex-lg-row justify-content-between mb-4">
                                <h2 class="m-0">Gold Evine</h2>
                            </div>
                            <div class="">
                                <div class="row">
                                    @foreach ($projectsearches as $projectsearch)
                                        <div class="col-3 mb-4">
                                            <a href="{{ route('projectDetail', ['id' => $projectsearch->id, 'slug' => $projectsearch->slug]) }}"
                                                style="text-decoration: none;color:rgb(92, 91, 91)">

                                                <div class="product-item">
                                                    <div class="img-holder">
                                                        <img src="{{ $projectsearch->feature_image }}"
                                                            onerror="this.src='{{ asset('images/default.png') }}'"
                                                            class="img-fluid">
                                                    </div>
                                                    <div class="txt-holder">
                                                        <strong
                                                            class="title text-center d-block mb-2">{!! Str::limit($projectsearch->title, 20, ' ...') !!}</strong>
                                                        <div class="progress rounded-0 mb-1">
                                                            <div class="progress-bar rounded-0" role="progressbar"
                                                                style="width: {{ persentage($projectsearch->id) }}%"
                                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <span>${{ number_format(totalamout($projectsearch->id)) }}
                                                                raised</span>
                                                            <span>{{ persentage($projectsearch->id) }} %</span>
                                                        </div>
                                                        <p class="mb-2">{{ number_format(donation($projectsearch->id)) }}
                                                            donations
                                                        </p>
                                                        <p class="m-0">{!! Str::limit($projectsearch->short_description, 25, ' ...') !!}</p>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                    @endforeach


                                </div>
                                {{-- <div>
                                    <div class="product-item">
                                        <div class="img-holder">
                                            <img src="images/product-img.png" class="img-fluid">
                                        </div>
                                        <div class="txt-holder">
                                            <strong class="title text-center d-block mb-2">Project Title</strong>
                                            <div class="progress rounded-0 mb-1">
                                              <div class="progress-bar rounded-0" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>sX.XXX raised</span>
                                                <span>XX%</span>
                                            </div>
                                            <p class="mb-2"># donations</p>
                                            <p class="m-0">Brief project description will go here... (10 words)</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="product-item">
                                        <div class="img-holder">
                                            <img src="images/product-img.png" class="img-fluid">
                                        </div>
                                        <div class="txt-holder">
                                            <strong class="title text-center d-block mb-2">Project Title</strong>
                                            <div class="progress rounded-0 mb-1">
                                              <div class="progress-bar rounded-0" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>sX.XXX raised</span>
                                                <span>XX%</span>
                                            </div>
                                            <p class="mb-2"># donations</p>
                                            <p class="m-0">Brief project description will go here... (10 words)</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="product-item">
                                        <div class="img-holder">
                                            <img src="images/product-img.png" class="img-fluid">
                                        </div>
                                        <div class="txt-holder">
                                            <strong class="title text-center d-block mb-2">Project Title</strong>
                                            <div class="progress rounded-0 mb-1">
                                              <div class="progress-bar rounded-0" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>sX.XXX raised</span>
                                                <span>XX%</span>
                                            </div>
                                            <p class="mb-2"># donations</p>
                                            <p class="m-0">Brief project description will go here... (10 words)</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="product-item">
                                        <div class="img-holder">
                                            <img src="images/product-img.png" class="img-fluid">
                                        </div>
                                        <div class="txt-holder">
                                            <strong class="title text-center d-block mb-2">Project Title</strong>
                                            <div class="progress rounded-0 mb-1">
                                              <div class="progress-bar rounded-0" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>sX.XXX raised</span>
                                                <span>XX%</span>
                                            </div>
                                            <p class="mb-2"># donations</p>
                                            <p class="m-0">Brief project description will go here... (10 words)</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="product-item">
                                        <div class="img-holder">
                                            <img src="images/product-img.png" class="img-fluid">
                                        </div>
                                        <div class="txt-holder">
                                            <strong class="title text-center d-block mb-2">Project Title</strong>
                                            <div class="progress rounded-0 mb-1">
                                              <div class="progress-bar rounded-0" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span>sX.XXX raised</span>
                                                <span>XX%</span>
                                            </div>
                                            <p class="mb-2"># donations</p>
                                            <p class="m-0">Brief project description will go here... (10 words)</p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-center mt-2">
                        {!! $projectsearches->appends(Request::all())->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
