@extends('frontend.admin.layouts.app')
@section('title')
    <title>All Contact Us</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="card-header d-flux">
                    <h5 class="d-inline">All Contact Us </h5>
                </div>
                <div class="table text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name  Last Name </th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @php
                                $i=1;
                            @endphp

                            @forelse ( $contacts as  $contact)

                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $contact->first_name  }}  {{ $contact->last_name  }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td>{{ Str::words($contact->message, 10, '...') }}</td>
                            </tr>
                            @empty

                            not found

                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->
        </div>
    </div>
@endsection
