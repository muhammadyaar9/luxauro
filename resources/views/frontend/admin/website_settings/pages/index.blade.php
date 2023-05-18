@extends('frontend.admin.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ translate('Website Pages') }}</h1>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header d-flux">
		<h6 class="d-inline">{{ translate('All Pages') }}</h6>
		<a href="{{ route('custom-pages.create') }}"  class="btn btn-outline-primary float-end">{{ translate('Add New Page') }}</a>
	</div>
	<div class="card-body">
		<table class="table aiz-table mb-0">
        <thead>
            <tr>
                <th data-breakpoints="lg">#</th>
                <th>{{translate('Name')}}</th>
                <th data-breakpoints="md">{{translate('URL')}}</th>
                <th class="text-right">{{translate('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
        	@foreach (\App\Models\Page::all() as $key => $page)
        	<tr>
        		<td>{{ $key+1 }}</td>
        		
				@if($page->type == 'home_page')
        			<td><a href="{{ route('custom-pages.show_custom_page', $page->slug) }}" class="text-reset">{{ $page->getTranslation('title') }}</a></td>
					<td>{{ route('home') }}</td>
				@else
        			<td><a href="{{ route('custom-pages.show_custom_page', $page->slug) }}" class="text-reset">{{ $page->getTranslation('title') }}</a></td>
					<td>{{ route('home') }}/{{ $page->slug }}</td>
				@endif
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                            data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            @if($page->type == 'home_page')
                            <a class="dropdown-item" href="{{route('custom-pages.edit', ['id'=>$page->slug, 'lang'=>env('DEFAULT_LANGUAGE'), 'page'=>'home'] )}}"><i
                                    class="bx bx-edit-alt me-1 text-success"></i> Edit</a>
                                    @else
                                    <a class="dropdown-item" href="{{route('custom-pages.edit', ['id'=>$page->slug, 'lang'=>env('DEFAULT_LANGUAGE')] )}}"><i
                                        class="bx bx-edit-alt me-1 text-success"></i> Edit</a>
                                        @endif
                                        @if($page->type == 'custom_page')
                            <a class="dropdown-item" href="{{ route('custom-pages.destroy', $page->id)}}" ><i
                                    class="bx bx-trash me-1 text-danger"></i> Delete</a>
                                    @endif
                        </div>
                    </div>
                </td>
        
        	</tr>
        	@endforeach
        </tbody>
    </table>
	</div>
</div>
@endsection

