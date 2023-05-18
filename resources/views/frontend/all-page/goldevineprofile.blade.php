@extends('frontend.layouts.app')
@section('title')
    <title>Goldevine Profile</title>
@endsection
@section('content')
    <div class="inner-content">
        <style>
            div[role="progressbar"]::before {
                display: none;
                counter-reset: percentage var(--value);
                content: "0%";
            }
        </style>
        {{-- {{ dd($projects) }} --}}
        <div class="section-product-charter">
            <div class="container">
                <div class="row col-lg-8 mx-auto gx-5">
                    <div class="col-12 col-md-12">
                        <div class="my-project founder-profile-page">
                            <div class="row mb-3">
                                <div class="col-12 col-md-4 d-flex align-items-center">
                                    <div class="account-image mx-auto mb-3 mb-md-0">
                                        <img src="{{ isset(auth()->user()->userDetails->user_profile_image) ? auth()->user()->userDetails->user_profile_image : '' }}"
                                            onerror="this.src='{{ asset('images/users.jfif') }}'" class="img-fluid w-100">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="luxauro-gmb-heading mb-3 mb-md-0">
                                        <div class="gmg-title">
                                            <h2 class="d-inline-block mb-0">
                                                {{ isset(auth()->user()->userDetails->name) ? auth()->user()->userDetails->name : '' }}
                                            </h2>
                                            <span class="ms-2 me-3"><i class="fa fa-star" aria-hidden="true"></i></span>
                                            {{-- <span><i class="fa fa-globe" aria-hidden="true"></i></span> --}}
                                        </div>
                                        <div class="gmb-subheading">
                                            <h3 class="d-inline-block mb-3">
                                                {{ isset(auth()->user()->userDetails->portfolio_name) ? auth()->user()->userDetails->portfolio_name : '' }}
                                            </h3>
                                            <span class="ms-2"><i class="fa fa-globe" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="gmg-language d-flex mb-2">
                                            <p class="mb-0 me-4">Languages</p>
                                            <button class="btn btn-light btn-sm py-0 px-2 me-2">English</button>
                                            <button class="btn btn-light btn-sm py-0 px-2 me-2">Spanish</button>
                                            <button class="btn btn-light btn-sm py-0 px-2">French</button>
                                        </div>
                                        <p class="mb-1 mb-md-0">
                                            {{ isset(auth()->user()->userDetails->description) ? Str::words(auth()->user()->userDetails->description, 15, '...') : '' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 d-flex align-items-end ">
                                    <div class="founder-proile-social">
                                        <ul
                                            class="list-unstyled m-0 p-0 d-flex justify-content-end align-items-left flex-column">
                                            <li class="mb-2"><a href="#">youtube.com/fakeuserprofile</a></li>
                                            <li class="mb-2"><a href="#">facebook.com/fakeuserprofile</a></li>
                                            <li class="mb-2"><a href="#">Twitter.com/fakeuserprofile</a></li>
                                            <li class="mb-2"><a href="#">instagram.com/fakeuserprofile</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="luxauro-subscription-current luxauro-ended">
                                @foreach ($projects as $project)
                                    <ul class="subscriptions-producct mb-4 p-0 list-unstyled d-flex flex-wrap">
                                        <li>
                                            <div class="sub-product-image mb-3 me-2">
                                                <img src="{{ $project->feature_image }}"
                                                    onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid"
                                                    alt="product-img" width="90px;">
                                            </div>
                                        </li>
                                        <li>
                                            <strong>{{ $project->title }}</strong>
                                            <div class="luxauro-product-item mb-3 me-2">
                                                <div class="by-user mb-2">
                                                    <span>by
                                                        {{ isset($project->user->userDetails->name) ? $project->user->userDetails->name : '' }}</span>
                                                    <span class="mx-2"><i class="fa fa-map-marker"
                                                            aria-hidden="true"></i></span>
                                                    <span>{{ $project->location }}</span>
                                                </div>
                                                <div class="progres-circle d-flex justify-content-between">
                                                    <div class="bar">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-6">
                                                                <div role="progressbar"
                                                                    aria-valuenow="{{ persentage($project->id) }}"
                                                                    aria-valuemin="0" aria-valuemax="100"
                                                                    style="--value:{{ persentage($project->id) }}">
                                                                    <p>
                                                                        {{ persentage($project->id) }}%
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="funds ">
                                                        <span
                                                            class="d-block mb-2 mx-2">${{ number_format(totalamout($project->id)) }}</span>
                                                        <span class="d-block">funds Rasied</span>
                                                    </div>
                                                    <div class="funds mx-2">
                                                        <span
                                                            class="d-block mb-2">${{ number_format($project->project_funding_goal) }}</span>
                                                        <span class="d-block">funding Goal</span>
                                                    </div>
                                                    <div class="funds mx-2">
                                                        <span class="d-block mb-2">{{ leftdays($project->id) }}</span>
                                                        <span class="d-block">Day Left</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="luxauro-product-item">
                                                <a href="{{ route('editProject', $project->id) }}">
                                                    <button class="btn btn-primary text-uppercase mx-3">Edit</button>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="street-img">
            <img src="{{ asset('images/img1.png') }}" class="img-fluid">
        </div>
    </div>
@endsection
