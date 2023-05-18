@extends('frontend.admin.layouts.app')
@section('title')
    <title>All Project</title>
@endsection
@section('content')
    <style>
        .suspended {
            border: none;
            background: none;
            cursor: pointer;
        }

        .active {
            border: none;
            background: none;
            cursor: pointer;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">All Project</h5>
                    <a href="{{ route('admin-goudevine-project.create') }}" class="btn btn-outline-primary float-end">Create
                        Project</a>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($projects as $project)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $project->title }}</strong>
                                    </td>
                                    <td>{{ $project->project_category }}</td>
                                    <td>{!! Str::limit($project->short_description, 20, ' ...') !!}</td>
                                    <td>
                                        <img src="{{ $project->feature_image }}"
                                            onerror="this.src='{{ asset('images/product-img.png') }}'" height="50px"
                                            width="50px" alt="">

                                    </td>

                                    <td>
                                        @if ($project->status == 'Active')
                                            <span class="badge rounded-pill bg-success">{{ $project->status }}</span><br>
                                        @else
                                            <span class="badge rounded-pill bg-danger">{{ $project->status }}</span><br>
                                        @endif
                                        @if ($project->status == 'Active')
                                            <button onclick="projectactive({{ $project->id }})" class="active"
                                                value="Active">
                                                <i class="bi bi-toggle-on text-success display-5"></i>
                                            </button>
                                        @else
                                            <button onclick="projectsuspended({{ $project->id }})" class="suspended"
                                                value="Suspended">
                                                <i class="bi bi-toggle-off text-danger display-5"></i>
                                            </button>
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
                                                    href="{{ route('admin-goudevine-project.edit', $project->id) }}"><i
                                                        class="bx bx-edit-alt me-1 text-success"></i> Edit</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin-goudevine-project.destroy', $project->id) }}"
                                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form{{ $project->id }}').submit();"><i
                                                        class="bx bx-trash me-1 text-danger"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                    <form id="logout-form{{ $project->id }}"
                                        action="{{ route('admin-goudevine-project.destroy', $project->id) }}" method="POST"
                                        class="d-none">
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

    <script>
        function projectsuspended(suspended_id) {
            var status = $('.suspended').val();
            $.ajax({
                url: "{{ route('project.suspended') }}",
                type: "get",
                data: {
                    suspended_id: suspended_id,
                    status: status
                },
                success: function(data) {
                    console.log(data);
                    swal({
                        title: "Active",
                        text: "Project Active Successfully",
                        icon: "success",
                        button: "Ok",
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                }
            });
        }

        function projectactive(active_id) {
            var status = $('.active').val();
            $.ajax({
                url: "{{ route('project.active') }}",
                type: "get",
                data: {
                    active_id: active_id,
                    status: status
                },
                success: function(data) {

                    swal({
                        title: "Suspended",
                        text: "Project Suspended Successfully",
                        icon: "success",
                        button: "Ok",
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                }
            });
        }
    </script>
@endsection
