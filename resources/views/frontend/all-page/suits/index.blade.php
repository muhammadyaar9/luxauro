@extends('frontend.layouts.app')
@section('title')
    <title>All Suits</title>
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
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Suits
                                    </li>
                                </ol>

                            </div>
                        </div>
                        <div class="Luxaurolicious-slider py-2">
                            <div class="row mb-3">

                                @foreach ($suits as $suit)
                                    <div class="col-md-3  col-12 my-2">
                                        <div class="product-item">
                                            <a href="#" style="color: rgb(75, 75, 75)">
                                                <a href="{{ route('suitsSuitsDetail',['id' => $suit->id ,'slug' => Str::slug($suit->business_name) ]) }}">
                                                    <div class="img-holder">
                                                        <img src="{{ $suit->business_logo }}"
                                                            onerror="this.src='{{ asset('images/default.png') }}'"
                                                            class="img-fluid">
                                                    </div>
                                                </a>
                                                <div class="txt-holder">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <div class="txt-holder">
                                                            <a href="{{ route('suitsSuitsDetail',['id' => $suit->id ,'slug' => Str::slug($suit->business_name) ]) }}" style="text-decoration: none;color:rgb(42, 40, 40)">
                                                                <strong class="title">{{ $suit->business_name }}</strong>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
