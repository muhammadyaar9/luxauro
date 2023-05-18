@extends('frontend.admin.layouts.app')
@section('title')
    <title>Create about Us</title>
@endsection
@section('content')
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create about Us</h5>
                <div class="card-body">
                    <form action="{{ route('about-us.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="about_us_type" value="Goldevine">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First Title</label>
                                    <input type="title" class="form-control @error('first_title') is-invalid @enderror" name="first_title" placeholder="first_title"
                                        title="title" value="{{ old('first_title') }}" />
                                    @error('first_title')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Description First</label>
                                    <textarea name="first_description" id="" class="form-control @error('first_description') is-invalid @enderror">{{ old('first_description') }}</textarea>
                                    @error('first_description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">image </label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="description"
                                        title="description" value="{{ old('image') }}" />
                                    @error('image')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Second Title</label>
                                    <input type="title" class="form-control @error('second_title') is-invalid @enderror" name="second_title" placeholder="title"
                                        title="second_title" value="{{ old('second_title') }}" />
                                    @error('second_title')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Description Second</label>
                                    <textarea name="second_description" id="" class="form-control @error('second_description') is-invalid @enderror">{{ old('second_description') }}</textarea>
                                    @error('second_description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('about-us.index') }}" class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
