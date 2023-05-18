@extends('frontend.layouts.app')
@section('content')
<div class="inner-content">
    <div class="about-banner py-5">
        <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb"
            class="d-flex justify-content-center align-items-center pb-1">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
            </ol>
        </nav>
        <div class="title text-black-50 text-center">
            <h2 class="text-black-50 bg-white d-inline-block px-1">Goldevine <br> Learn About The Tribrid</h2>
        </div>
    </div>
    <div class="section-cookie-policy">
        <div class="container">
            <div class="cookie-policy col-lg-10 mx-auto">
            @if (isset($ribrid->title))
                <h2 class="text-center mb-4">{!! $ribrid->title !!}</h2>
                {!! $ribrid->learn_about_description !!}

            @endif

            </div>
        </div>
    </div>
</div>
@endsection
