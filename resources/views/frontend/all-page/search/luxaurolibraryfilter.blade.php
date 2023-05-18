    @php
        $displayedProducts = []; // create an empty array to store displayed product IDs
    @endphp
    @forelse ($luxauroLibrarys as $luxauroLibrary)
        @foreach ($luxauroLibrary->categories as $category)
            @if ($category->title == 'Publishing' || $category->title == 'Forum' || $category->title == 'Luxauro Library')
                @if (!in_array($luxauroLibrary->id, $displayedProducts))
                    <div>
                        <div class="product-item">
                            <a
                                href="{{ route('productDetails', ['id' => $luxauroLibrary->id, 'slug' => Str::slug($luxauroLibrary->product_name)]) }}">
                                <div class="img-holder">
                                    <img src="{{ $luxauroLibrary->image }}"
                                        onerror="this.src='{{ asset('images/default.png') }}'"
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="txt-holder">
                                <div class="d-flex justify-content-between mb-3">
                                    <div>
                                        <a
                                            href="{{ route('productDetails', ['id' => $luxauroLibrary->id, 'slug' => Str::slug($luxauroLibrary->product_name)]) }}">
                                            <strong class="title"
                                                style="color:black">{{ $luxauroLibrary->product_name }}</strong>
                                        </a>
                                        <ul class="list-unstyled m-0 p-0 d-flex stars">
                                            @php
                                                $size = (int) $luxauroLibrary->ratings()->avg('rating');
                                                $unstart = 5 - $size;
                                            @endphp
                                            @for ($i = 0; $i < $size; $i++)
                                                <li class="me-1"><i class="fa fa-star"
                                                        style="color: #133033"></i>
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
                                    <strong class="title">${{ $luxauroLibrary->product_price }}</strong>
                                    <button class="btn bg-dark text-white py-1 px-2"
                                        onclick="addToCart('{{ $luxauroLibrary->id }}', '{{ $luxauroLibrary->product_name }}', '{{ $luxauroLibrary->product_price }}')"><i
                                            class="fa fa-shopping-basket"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        array_push($displayedProducts, $luxauroLibrary->id); // add the displayed product ID to the array
                    @endphp
                @endif
            @endif
        @endforeach
    @empty

        <div>
            <p>
                No Product Found
            </p>
        </div>
    @endforelse