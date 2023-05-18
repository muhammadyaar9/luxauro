@extends('frontend.admin.layouts.app')
@section('title')
    <title>Create Category</title>
@endsection
@section('content')
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Category</h5>
                <div class="card-body">
                    <form action="{{ route('goldevine-category.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="title"
                                        title="title" value="{{ old('title') }}" />
                                    @error('title')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Price"
                                        title="title" value="{{ old('price') }}" />
                                    @error('price')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Donations</label>
                                    <input type="text" class="form-control @error('donations') is-invalid @enderror" name="donations" placeholder="Donations"
                                        title="donations" value="{{ old('donations') }}" />
                                    @error('donations')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Raised</label>
                                    <input type="text" class="form-control @error('raised') is-invalid @enderror" name="raised" placeholder="Raised"
                                        title="Raised" value="{{ old('raised') }}" />
                                    @error('raised')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Raised Percentage</label>
                                    <input type="text" class="form-control @error('raised_percentage') is-invalid @enderror" name="raised_percentage" placeholder="raised Percentage"
                                        title="raised_Percentage" value="{{ old('raised_percentage') }}" />
                                    @error('raised_percentage')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Short Description</label>
                                    <input type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" placeholder="Short Description"
                                        title="short_description" value="{{ old('short_description') }}" />
                                    @error('short_description')
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
                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">image </label>
                                    <textarea name="description" id=""class="form-control @error('description') is-invalid @enderror" name="description" placeholder="description"
                                    title="description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('goldevine-category.index') }}" class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" oncanplay="this.form.submit();this.disabled=true;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
