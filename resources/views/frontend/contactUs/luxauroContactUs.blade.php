@extends('frontend.layouts.app')
@section('content')
    <div class="inner-content">
        <div class="about-banner py-5">
            <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb"
                class="d-flex justify-content-center align-items-center pb-1">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <div class="title text-black-50 text-center">
                <h2 class="text-black-50 bg-white d-inline-block">Contact Luxauro</h2>
            </div>
        </div>
        <div class="contact-us-section mb-4">
            <div class="container">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <h2 class="pb-2">Lorem ipsum is simply dummy text</h2>
                    <form action="{{ route('contactUsStore') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="Luxauro" name="contact_us_type">
                        @csrf
                        <div class="row gx-2">
                            <div class="col-12 col-md-6">
                                <input type="text" placeholder="First Name"
                                    class="form-control mb-3 p-2 @error('first_name')is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" placeholder="Last Name"
                                    class="form-control mb-3 p-2 @error('last_name')is-invalid @enderror "
                                    id="exampleInputPassword1" name="last_name" value="{{ old('last_name') }}">

                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="col-12 col-md-6">
                                <input type="email" placeholder="Email Address"
                                    class="form-control mb-3 p-2 @error('email')is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="number" placeholder="Phone Number"
                                    class="form-control mb-3 p-2 @error('phone_number')is-invalid @enderror"
                                    id="exampleInputPassword1" name="phone_number" value="{{ old('phone_number') }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <textarea class="form-control mb-4 @error('message')is-invalid @enderror" placeholder="Message..."
                            id="exampleFormControlTextarea1" rows="3" name="message">{{ old('message') }}</textarea>

                        @error('message')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-submit py-2 px-4">SUBMIT</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
