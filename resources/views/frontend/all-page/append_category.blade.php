@foreach ($categories as $category)
<div class="col-6 col-md-4 col-lg-2 mb-4">
    <div class="product-item">
        <div class="img-holder">
            <img src="{{ isset($category->image) ? $category->image : asset('images/product-img.png') }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid" alt="">
        </div>
        <div class="txt-holder">
            <strong class="title">{{ $category->title }}</strong>
        </div>
    </div>
</div>
@endforeach