@extends('frontend.admin.layouts.app')
@section('title')
    <title>Delivery Option</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">All Delivery Option</h5>
                    <a href="{{ route('delivory-option.create') }}" class="btn btn-outline-primary float-end">Add Delivery
                        Options</a>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($delivoryOptions as $delivory)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $delivory->name }}</strong>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('delivory-option.edit',$delivory->id) }}">
                                                    <i class="bx bx-edit-alt me-1 text-success"></i>
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="{{ route('delivory-option.destroy',$delivory->id) }}"onclick="event.preventDefault();
                                                    document.getElementById('logout-form{{ $delivory->id}}').submit();">
                                                    <i class="bx bx-trash me-1 text-danger"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                        <form id="logout-form{{ $delivory->id}}" action="{{ route('delivory-option.destroy',$delivory->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
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
