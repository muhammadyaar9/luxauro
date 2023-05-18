
    @forelse ($nationalshops as $nationalshop)
        <div>
            <div class="product-item">
                <a href="{{ route('suitsProducts', $nationalshop->user_id) }}">
                    <div class="img-holder">
                        <img src="{{ $nationalshop->business_logo }}"
                            onerror="this.src='{{ asset('images/default.png') }}'" class="img-fluid">
                    </div>
                </a>
                <div class="txt-holder">
                    <a href="{{ route('suitsProducts', $nationalshop->user_id) }}"
                        style="text-decoration: none;color:rgb(42, 40, 40)">
                        <strong class="title">{{ $nationalshop->business_name }}</strong>
                    </a>
                </div>
            </div>
        </div>
    @empty

        <div class="row">
            <h2>
                No National Shops Found
            </h2>
        </div>
    @endforelse