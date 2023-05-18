@extends('frontend.admin.layouts.app')
@section('title')
    <title>About Us</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">About Us</h5>
                    @if ($aboutcount == null)
                        <a href="{{ route('learn-about-tribrid.create') }}" class="btn btn-outline-primary btn-sm float-end"><i
                                class="fa fa-plus"></i> Add</a>

                    @endif
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>First Description </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @isset($aboutUs->title)
                                <tr>

                                    <td>1</td>
                                    <td>{{ Str::words($aboutUs->title, 2, '...') }}</td>
                                    <td>{!! Str::words($aboutUs->learn_about_description, 2, '...') !!}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('learn-about-tribrid.edit', $aboutUs->id) }}"
                                                    class="btn btn-primary btn-sm">Edit<i class="fa fa-edit"></i></a>
                                                <a href="{{ route('learn-about-tribrid.destroy', $aboutUs->id) }}"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
@endsection
