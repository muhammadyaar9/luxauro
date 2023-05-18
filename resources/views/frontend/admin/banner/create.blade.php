@extends('frontend.admin.layouts.app')
@section('title')
    <title>Create Banner</title>
@endsection
@section('content')
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create Banner</h5>
                <div class="card-body">
                    <form action="{{ route('banner.store') }}" enctype="multipart/form-data" method="post">
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
                                    <label for="exampleFormControlInput1" class="form-label">image </label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="description"
                                        title="description" value="{{ old('image') }}" />
                                    @error('image')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('banner.index') }}" class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" onclick="this.form.submit();this.disabled=true;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
