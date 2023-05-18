@extends('frontend.admin.layouts.app')
@section('title')
    <title>All Product Type</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">All Product Type</h5>
                    <a href="{{ route('product-type.create') }}" class="btn btn-outline-primary float-end">Create Product
                        Type</a>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>

                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($producttypes as $producttypes)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $producttypes->title }}</strong>
                                    </td>
                                    <td>{{ $producttypes->description }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('product-type.edit', $producttypes->id) }}">
                                                    <i class="bx bx-edit-alt me-1 text-success"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="{{ route('product-type.destroy',$producttypes->id) }}"  onclick="event.preventDefault();
                                                document.getElementById('logout-form{{ $producttypes->id}}').submit();" >
                                                    <i class="bx bx-trash me-1 text-danger"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <form id="logout-form{{ $producttypes->id}}" action="{{ route('product-type.destroy',$producttypes->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
@endsection
