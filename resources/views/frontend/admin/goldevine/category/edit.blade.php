@extends('frontend.admin.layouts.app')
@section('title')
    <title>Edit Project</title>
@endsection
@section('content')
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Project</h5>
                <div class="card-body">
                    <form action="{{ route('admin-goudevine-product.update',$project->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="title"
                                        title="title" value="{{ $project->title }}" />
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
                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">image </label>
                                    <textarea name="description" id=""class="form-control @error('description') is-invalid @enderror" name="description" placeholder="description"
                                    title="description">{{ $project->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('admin-goudevine-product.index') }}" class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" onclick="this.form.submit();this.disabled=true;" >Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
