@extends('frontend.admin.layouts.app')
@section('title')
    <title>Edit Delivery Option</title>
@endsection
@section('content')
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Delivery Option</h5>
                <div class="card-body">
                    <form action="{{ route('delivory-option.update', $delivoryOption->id) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="name" class="form-control" name="name" placeholder="title"
                                        value="{{ $delivoryOption->name }}" />
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('delivory-option.index') }}"
                                        class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" onclick="this.form.submit(); this.disabled = true;">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
