@extends('frontend.layouts.app')
@section('meta')
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $page->meta_title }}">
    <meta itemprop="description" content="{{ $page->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($page->meta_img) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $page->meta_title }}">
    <meta name="twitter:description" content="{{ $page->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($page->meta_img) }}">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $page->meta_title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ URL($page->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($page->meta_img) }}" />
    <meta property="og:description" content="{{ $page->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
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
      <div class="about-sections mb-4">
        <div class="container">
            <div class="col-md-11 mx-auto">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="about-img-holder flex-fill mb-3 mb-md-0">
                            <img src="images/about01.png" class="img-fluid d-block mx-auto">
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12 col-md-6">
                    @php echo $page->getTranslation('content'); @endphp
                </div> --}}
            </div>
            <div class="cookie-policy col-lg-10 mx-auto">
                @php echo $page->getTranslation('content'); @endphp
            </div>
        </div>
    </div>
      <div class="street-img">
				<img src="images/img1.png" class="img-fluid">
			</div>
    </div>
    </div>
    </div>

@endsection
