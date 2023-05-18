@extends('frontend.layouts.app')
@section('title')
    <title>My Project</title>
@endsection
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <div class="inner-content">
        <style>
            div[role="progressbar"]::before {
                display: none !important;
                counter-reset: percentage var(--value);
                content: "0%";
            }
        </style>
        <div class="section-product-charter">
            <div class="container">
                <div class="row col-lg-9 mx-auto gx-5">
                    <div class="col-12 col-md-5 gx-0 gx-md-1 gx-lg-5 px-lg-3">
                        @include('frontend.include.sidebar')
                    </div>
                    <div class="col-12 col-md-7 gx-0 gx-md-1 gx-lg-2 px-lg-1">
                        <div class="my-project">
                            <div class="mb-4 d-flex justify-content-end mb-md-5">
                                <a href="{{ route('createProject') }}"
                                    class="btn btn-primary text-uppercase text-white p-2">create a project</a>
                            </div>
                            <div class="luxauro-subscription-current luxauro-ended">
                                @foreach ($projects as $project)
                                    <ul class="subscriptions-producct mb-4 p-0 list-unstyled d-flex flex-wrap">
                                        <li>
                                            <div class="sub-product-image mb-3 me-2">
                                                <img src="{{ $project->feature_image }}"
                                                    onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid"
                                                    alt="product-img" width="80px;">
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

                                                    <div role="progressbar" aria-valuenow="{{ persentage($project->id) }}"
                                                        aria-valuemin="0" aria-valuemax="100"
                                                        style="--value:{{ persentage($project->id) }}">
                                                        <p>
                                                            <span>{{ persentage($project->id) }}</span>
                                                            <span>%</span>
                                                        </p>
                                                    </div>


                                                    <div class="funds ms-3">
                                                        <span
                                                            class="d-block mb-2 mx-2">${{ number_format(totalamout($project->id)) }}</span>
                                                        <span class="d-block">funds Rasied</span>
                                                    </div>
                                                    <div class="funds ms-2">
                                                        <span
                                                            class="d-block mb-2">${{ number_format($project->project_funding_goal) }}</span>
                                                        <span class="d-block">funding Goal</span>
                                                    </div>
                                                    <div class="funds ms-2">
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
    </div>
    <div class="street-img">
        <img src="{{ asset('images/img1.png') }}" class="img-fluid">
    </div>
@endsection
