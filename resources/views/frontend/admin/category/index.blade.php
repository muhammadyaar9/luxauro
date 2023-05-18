@extends('frontend.admin.layouts.app')
@section('title')
    <title>All Category</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">Table Basic</h5>
                    <a href="{{ route('category.create') }}" class="btn btn-outline-primary float-end">Create Category</a>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $category->title }}</strong>
                                    </td>
                                    <td>
                                        <img src="{{ $category->image }}" height="50px" width="50px" alt="" onerror="this.src='{{ asset('images/default.png') }}'">

                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('category.edit', $category->id) }}"><i
                                                        class="bx bx-edit-alt me-1 text-success"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ route('category.destroy',$category->id) }}"  onclick="event.preventDefault();
                                                document.getElementById('logout-form{{ $category->id}}').submit();"><i
                                                        class="bx bx-trash me-1 text-danger"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    <form id="logout-form{{ $category->id}}" action="{{ route('category.destroy',$category->id) }}" method="POST" class="d-none">
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
