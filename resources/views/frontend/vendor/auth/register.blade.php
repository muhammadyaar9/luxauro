@extends('frontend.layouts.app')
@section('title')
    <title>Vendor Register</title>
@endsection
@section('content')
    <div class="signin-section create-account-section">
        <div class="row align-items-center gx-5">
            <div class="col-12 col-md-5 mb-4">
                <div class="sign-in-section">
                    <div class="col-md-8 px-3 px-md-0">
                        <h2>Create An Acoount</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda eaque obcaecati,
                            itaque excepturi voluptas ducimus,
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 mb-4 px-md-5">
                <div class="sign-in col-md-9 px-3 px-md-0">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="role" value="Vendor">
                        <input type="hidden" name="status" value="Pending">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Shop Name" aria-label="shop_name"
                                aria-describedby="addon-wrapping @error('shop_name') is-invalid @enderror" name="shop_name"
                                value="{{ old('shop_name') }}" required autocomplete="shop_name" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" aria-label="email"
                                aria-describedby="addon-wrapping @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row gx-2">
                            <div class="col-12 col-md-6 mb-3">
                                <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                                    aria-describedby="addon-wrapping @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <input type="password" class="form-control" placeholder="Retype Password"
                                    aria-label="Retypepassword" aria-describedby="addon-wrapping"
                                    name="password_confirmation" required autocomplete="new-password">
                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Zip Code" aria-label="code"
                                aria-describedby="addon-wrapping" name="zip_code" required value="{{ old('zip_code') }}">

                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required value="1"
                                name="conditions">
                            <label class="form-check-label" for="exampleCheck1">By register you agree to the <strong>Term &
                                    Conditions.</strong></label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                            <button class="btn btn-primary px-4">SUBMIT</button>
                            <a href="{{ route('login') }}" class="mb-0 d-inline-block">Already have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="street-img">
            <img src="images/img1.png" class="img-fluid">
        </div>
    </div>
@endsection
