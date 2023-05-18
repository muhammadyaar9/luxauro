@extends('frontend.layouts.app')
@section('title')
    <title>Register</title>
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
                        <input type="hidden" name="role" value="User">
                        <input type="hidden" name="status" value="Active">
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












{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
