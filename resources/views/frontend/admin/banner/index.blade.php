@extends('frontend.admin.layouts.app')
@section('title')
    <title>All Banner</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">Table Basic</h5>
                    <a href="{{ route('banner.create') }}" class="btn btn-outline-primary float-end">Create Banner</a>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $banner->title }}</strong>
                                    </td>
                                    <td>
                                        <img src="{{ $banner->image }}"
                                            onerror="this.src='{{ asset('images/product-img.png') }}'" height="50px"
                                            width="50px" alt="">

                                    </td>
                                    <td>
                                        @if ($banner->status == 'active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Suspend</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('banner.edit', $banner->id) }}"><i
                                                        class="bx bx-edit-alt me-1 text-success"></i> Change Status </a>
                                                <a class="dropdown-item" href="{{ route('banner.destroy',$banner->id) }}"  onclick="event.preventDefault();
                                                document.getElementById('logout-form{{ $banner->id}}').submit();"><i
                                                        class="bx bx-trash me-1 text-danger"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    <form id="logout-form{{ $banner->id}}" action="{{ route('banner.destroy',$banner->id) }}" method="POST" class="d-none">
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
