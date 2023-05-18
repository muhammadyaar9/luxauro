@extends('frontend.admin.layouts.app')
@section('title')
    <title>Edit Product Type</title>
@endsection
@section('content')
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Product Type</h5>
                <div class="card-body">
                    <form action="{{ route('product-type.update',$producttypes->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="title" class="form-control" name="title" placeholder="title"
                                        title="title" value="{{ $producttypes->title }}" />
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                                    <input type="description" class="form-control" name="description"
                                        placeholder="description" title="description" value="{{ $producttypes->description }}" />
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('product-type.index') }}" class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" onclick="this.form.submit(); this.disabled= true;" >Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
