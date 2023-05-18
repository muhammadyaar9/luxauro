@foreach ($productsassending as $productsassendings)
    <div>
        <div class="product-item">
            <a
                href="{{ route('productDetails', ['id' => $productsassendings->id, 'slug' => Str::slug($productsassendings->product_name)]) }}">
                <div class="img-holder">
                    <img src="{{ $productsassendings->image }}" onerror="this.src='{{ asset('images/default.png') }}'"
                        class="img-fluid">
                </div>
            </a>
            <div class="txt-holder">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <a href="{{ route('productDetails', ['id' => $productsassendings->id, 'slug' => Str::slug($productsassendings->product_name)]) }}"
                            style="color:black">
                            <strong class="title">{{ $productsassendings->product_name }}</strong>
                        </a>
                        <ul class="list-unstyled m-0 p-0 d-flex stars">
                            @php
                                $size = (int) $productsassendings->ratings()->avg('rating');
                                $unstart = 5 - $size;
                            @endphp
                            @for ($i = 0; $i < $size; $i++)
                                <li class="me-1"><i class="fa fa-star" style="color: #133033"></i>
                                </li>
                            @endfor
                            @for ($i = 0; $i < $unstart; $i++)
                                <li class="me-1"><i class="bi bi-star"></i></li>
                            @endfor
                        </ul>
                    </div>
                    <i class="fa fa-globe fa-1x mt-2"></i>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <strong class="title">${{ $productsassendings->product_price }}</strong>
                    <button class="btn bg-dark text-white py-1 px-2"
                        onclick="addToCart('{{ $productsassendings->id }}', '{{ $productsassendings->product_name }}', '{{ $productsassendings->product_price }}')"><i
                            class="fa fa-shopping-basket"></i>
                    </button>
                    <input type="hidden" name="" value="1" class="addOrRemove">
                </div>
            </div>
        </div>
    </div>
@endforeach
