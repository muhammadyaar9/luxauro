@foreach ($charters as $charter)
<div class="slick-slide slick-current slick-active" style="width: 225px;margin: 0 12px;" data-slick-index="0" aria-hidden="false" tabindex="0">
    <a href="{{route('charter_detail',['id'=>$charter->id])}}">
        <div class="product-item">
            <div class="img-holder">
                <img src="{{ $charter->thumbnail_img }}" onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
            </div>
            <div class="txt-holder">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <strong class="title">{{ $charter->name }}</strong>
                        <ul class="list-unstyled m-0 p-0 d-flex stars">
                            <li class="me-1"><i class="fa fa-star"></i></li>
                            <li class="me-1"><i class="fa fa-star"></i></li>
                            <li class="me-1"><i class="fa fa-star"></i></li>
                            <li class="me-1"><i class="fa fa-star"></i></li>
                            <li class="me-1"><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                    <i class="fa fa-globe fa-1x mt-2"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <strong class="title">${{ $charter->rate }}</strong>
                    <a class="btn bg-dark text-white py-1 px-2" href="javascript:void"><i class="fa fa-shopping-basket"></i></a>
                </div>
            </div>
        </div>
    </a>

</div>
@endforeach
