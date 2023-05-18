@extends('frontend.admin.layouts.app')
@section('title')
    <title>Create Learn About The Tribrid</title>
@endsection
@section('content')
{{-- CKEDITOR  link --}}

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Create about Us</h5>
                <div class="card-body">
                    <form action="{{ route('goldevine-rule.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="type" value="Rule">
                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First Title</label>
                                    <input type="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="title"
                                        title="title" value="{{ old('title') }}" />
                                    @error('title')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Description First</label>
                                    <textarea name="learn_about_description" id="" class="form-control @error('learn_about_description') is-invalid @enderror">{{ old('learn_about_description') }}</textarea>
                                    @error('learn_about_description')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-sm-12 text-end">
                                    <a href="{{ route('goldevine-rule.index') }}" class="btn btn-outline-danger mx-2">Closed</a>
                                    <button class="btn btn-outline-primary" type="submit" onclick="this.form.submit(); this.disabled = true;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('learn_about_description');
    </script>


@endsection
