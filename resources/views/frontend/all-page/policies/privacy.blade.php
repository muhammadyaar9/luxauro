@extends('frontend.layouts.app')
@section('meta')
    
@endsection
@section('title')
    <title>{{ $page->getTranslation('title') }}<</title>
@endsection
@section('content')

    <div class="container">
    <div class="inner-content">
      <div class="about-banner py-5">
        <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb" class="d-flex justify-content-center align-items-center pb-1">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('home') }}">{{ translate('Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('custom-pages.show_custom_page', $page->slug ) }}">{{ $page->title }}</a></li>
          </ol>
        </nav>
        <div class="title text-black-50 text-center">
            <h2 class="text-black-50 bg-white d-inline-block">{{ $page->title }}</h2>
        </div>
      </div>
      <div class="section-cookie-policy">
        <div class="container">
            <div class="cookie-policy col-lg-10 mx-auto">
                @php echo $page->getTranslation('content'); @endphp
            </div>
            <p></p>
        </div>
    </div>
      <div class="street-img">
				<img src="images/img1.png" class="img-fluid">
			</div>
    </div>
    </div>
    </div>

@endsection
