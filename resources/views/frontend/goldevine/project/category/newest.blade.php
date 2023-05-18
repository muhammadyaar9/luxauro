@extends('frontend.layouts.app')
@section('title')
    <title>All Golveine Newest</title>
@endsection
@section('content')
    <div class="inner-content mt-4">
        <div class="product-page-section">
            <div class="col-12 col-md-10 mx-auto">
                <div class="product-section mb-5 pb-lg-3">
                    <div class="container">
                        <div class="d-md-flex justify-content-between align-items-center flex-wrap mb-3">
                            <div class="mb-3 mb-md-0">
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Newest Projects
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="Luxaurolicious-slider ">
                            <div class="row mb-3">
                                @forelse ($newestprojects as $goldevine)
                                    @php
                                        $total_amount = App\Models\Admin\Goldevine\GoldevineOrder::where('project_id', $goldevine->id)->sum('total_price');
                                        $donations = App\Models\Admin\Goldevine\GoldevineOrder::where('project_id', $goldevine->id)->count();
                                        
                                    @endphp
                                    <div class="col-md-3  col-12 my-2">
                                        <a
                                            href="{{ route('projectDetail', ['id' => $goldevine->id, 'slug' => $goldevine->slug]) }}" style="color: rgb(59, 59, 59)">
                                            <div class="product-item">
                                                <div class="img-holder">
                                                    <img src="{{ $goldevine->feature_image }}"
                                                        onerror="this.src='{{ asset('images/default.png') }}'"
                                                        class="img-fluid">
                                                </div>

                                                <div class="txt-holder">
                                                    <strong
                                                        class="title text-center d-block mb-2">{{ Str::words($goldevine->title, 2, '...') }}</strong>
                                                    <div class="progress rounded-0 mb-1">
                                                        <div class="progress-bar rounded-0" role="progressbar"
                                                            style="width:{{ persentage($goldevine->id) }}%"
                                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>${{ number_format($total_amount) }} Raised</span>
                                                        <span>{{ persentage($goldevine->id) }}%</span>
                                                    </div>
                                                    <p class="mb-2">{{ donation($goldevine->id) }} Donations</p>
                                                    <p class="m-0">
                                                        {{ Str::words($goldevine->short_description, 10, '...') }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="container">
                                        No GoldEvine Project
                                    </div>
                                @endforelse
                                {{-- @foreach ($products as $product)
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
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            {!! $newestprojects->appends(Request::all())->links() !!}
                        </div>
                        <div class=" mb-4">
                            <div class="container-fluid p-5">
                                <div class="col-md-10 mx-auto">
                                    <div class="merchant-banner-text">
                                        <img src="{{ banner()->image }}"
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
    @endsection
