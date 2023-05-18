@extends('frontend.layouts.app')
@section('title')
    <title>Checkout</title>
@endsection
@section('content')
    <div class="inner-content">
        <div class="shopping-bag-section mt-5">
            <div class="container">
                <form action="{{ route('order.paymenttype') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h2 class="py-3">My Shopping Bag</h2>
                            <div class="shopping-bag-component luxauro-subscription-currents mb-3">
                                <h3 class="mb-4">Luxauro</h3>
                                @php
                                    $total = 0;
                                    $shipping_charge = 0;
                                    $subtotal = 0;
                                @endphp
                                @foreach ($allcartorders as $allcartorder)
                                    <div class="allcartitem{{ $allcartorder->id }}">
                                        <ul
                                            class="subscriptions-produccts mb-4 p-0 list-unstyled d-flex align-items-self-start justify-content-between flex-wrap">
                                            <input type="hidden" name="cart_id[]" value="{{ $allcartorder->id }}">
                                            <li>
                                                <div class="sub-product-image mb-3 mb-md-4">
                                                    <img src="{{ $allcartorder->product->image }}"
                                                        onerror="this.src='{{ asset('images/default.png') }}'"
                                                        class="img-fluid" alt="product-img" width="300px;">
                                                </div>
                                            </li>
                                            <li class="mx-2 mb-2">
                                                <strong>{{ $allcartorder->product->product_name }}</strong>
                                                <div>
                                                    <ul class="list-unstyled m-0 p-0">
                                                        <li>
                                                            <p class="mb-0">
                                                                {{ isset($allcartorder->product->user->userDetails->name)
                                                                    ? $allcartorder->product->user->userDetails->name
                                                                    : '' }}
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="mb-2"><span><i class="fa fa-map-marker me-2"
                                                                        aria-hidden="true"></i></span>{{ isset($allcartorder->product->user->userDetails->address) ? $allcartorder->product->user->userDetails->address : '' }}
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p> {{ Str::limit($allcartorder->product->product_description, 50) }}
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <div class="shopping-bag-pickup d-flex">
                                                                <div class="shopping-bag-delivery me-3">
                                                                    <strong class="shopping-bag-title">
                                                                        @foreach ($allcartorder->product->deliveryOption as $deliveryOption)
                                                                            {{ $deliveryOption->delivery_option }}
                                                                            @if (!$loop->last)
                                                                                ,
                                                                            @endif
                                                                        @endforeach
                                                                    </strong>
                                                                    <span class="estimated mb-2">Estimated Arrival:<span
                                                                            class="d-block"></span>Thurs, Feb 16</span>
                                                                    <p class="mb-0"><strong
                                                                            class="shopping-bag-title">${{ $allcartorder->product->shipping_charge }}</strong>
                                                                    </p>
                                                                </div>
                                                                {{-- <div class="shopping-bag-delivery" style="cursor: pointer"
                                                                onclick="pickup({{ $allcartorder->id }})">
                                                                <p class="mb-0"><strong
                                                                        class="shopping-bag-title">Pickup</strong>
                                                                </p>
                                                                <p class="mb-0"><strong
                                                                        class="shopping-bag-title">Free</strong>
                                                                </p>
                                                            </div> --}}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <hr class="my-2">
                                                        </li>
                                                        <li>
                                                            <div class="save-for-later d-flex" style="width: 100px;">
                                                                <a href="javascript:void(0)" class="form-control"
                                                                    onclick="orderdestroycheckout({{ $allcartorder->id }},{{ $allcartorder->product->product_price * $allcartorder->quantity }},{{ $allcartorder->product->shipping_charge }} )">
                                                                    <p class="mb-0">Remove</p>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shopping-bag-payment">
                                                    <span
                                                        class="payment-titles">${{ $allcartorder->product->product_price }}</span>
                                                    <span class="px-1"> x </span>
                                                    <div
                                                        class="product-details-quantity border rounded d-inline-block me-3">
                                                        <span class="input-number-decrement{{ $allcartorder->id }}"
                                                            onclick="decrements({{ $allcartorder->id }} , {{ $allcartorder->product->product_price }})"
                                                            style="cursor: pointer;
                                                            ">–</span><input
                                                            class="input-number addOrRemoves{{ $allcartorder->id }}"
                                                            type="text" value="{{ $allcartorder->quantity }}"
                                                            min="1" max="10" id="" readonly><span
                                                            class="input-number-increment"
                                                            onclick="increments({{ $allcartorder->id }} , {{ $allcartorder->product->product_price }})">+</span>
                                                    </div>
                                                    {{-- <span class="border rounded px-1">{{ $allcartorder->quantity }}</span> --}}
                                                    <span>=</span>
                                                    <input type="hidden" class="price{{ $allcartorder->id }}"
                                                        value="{{ $allcartorder->product->product_price * $allcartorder->quantity }}">
                                                    <span
                                                        class="payment-titles appendprice{{ $allcartorder->id }} ">${{ $allcartorder->product->product_price * $allcartorder->quantity }}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    @php
                                        $subtotal += $allcartorder->product->product_price * $allcartorder->quantity;
                                        $total += $allcartorder->product->product_price * $allcartorder->quantity + $allcartorder->product->shipping_charge;
                                        $shipping_charge += $allcartorder->product->shipping_charge;
                                    @endphp
                                @endforeach


                            </div>

                            <div class="shopping-bag-component luxauro-subscription-currents mb-3">
                                <h3 class="mb-4">Goldevine</h3>

                                @php
                                    $totalPriceGoldevine = 0;
                                @endphp

                                @foreach ($goldenevines as $projectBenefit)
                                <input type="hidden" name="project_id[]" value="{{ $projectBenefit->project_benefit->project->id }}">
                                <input type="hidden" name="benefit_id[]" value="{{ $projectBenefit->project_benefit->id }}">
                                <input type="hidden" name="select_project_benefits_id[]" value="{{ $projectBenefit->id }}">
                                <input type="hidden" name="project_user_id[]" value="{{ $projectBenefit->project_benefit->project->user_id }}">
                                <input type="hidden" name="price[]" value="{{ $projectBenefit->project_benefit->price }}">


                                    <div class="removebenefit{{ $projectBenefit->id }}">
                                        <ul
                                            class="subscriptions-produccts mb-4 p-0 list-unstyled d-flex align-items-self-start justify-content-between flex-wrap">
                                            <li>
                                                <div class="sub-product-image mb-3 mb-md-4">
                                                    <img src="{{ $projectBenefit->project_benefit->feature_image }}"
                                                        width="200px" class="img-fluid" alt="product-img"
                                                        onerror="this.src='{{ asset('images/default.png') }}'">
                                                </div>
                                            </li>
                                            <li class="mx-2 mb-2">
                                                <strong>{{ $projectBenefit->project_benefit->project_benefit }}</strong>
                                                <div>
                                                    <ul
                                                        class="list-unstyled m-0 p-0 selectBenefits{{ $projectBenefit->id }}">
                                                        {{-- <li>{{ dd($projectBenefit->project_benefit->project->user->userDetails->name) }} --}}
                                                        <p class="mb-0">Solid by
                                                            {{ isset($projectBenefit->project_benefit->project->user->userDetails->name) ? $projectBenefit->project_benefit->project->user->userDetails->name : '' }}
                                                        </p>
                                            </li>
                                            <li>
                                                <p class="mb-2"><span><i class="fa fa-map-marker me-2"
                                                            aria-hidden="true"></i></span>{{ isset($projectBenefit->project_benefit->project->user->userDetails->address) ? $projectBenefit->project_benefit->project->user->userDetails->address : '' }}
                                                </p>
                                            </li>
                                            <li>
                                                <p> Description:
                                                    {{ Str::words($projectBenefit->project_benefit->project->short_description, 10, '...') }}
                                                </p>
                                            </li>
                                            <li>
                                                <div class="shopping-bag-pickup d-flex">
                                                    <div class="shopping-bag-delivery me-3">
                                                        {{-- <strong class="shopping-bag-title">Delivery</strong>
                                                                <span class="estimated mb-2">Estimated Arrival:<span
                                                                        class="d-block"></span> Thurs, Feb 16</span> --}}
                                                        <p class="mb-0">
                                                            <strong
                                                                class="shopping-bag-title">${{ number_format($projectBenefit->project_benefit->price) }}</strong>
                                                        </p>
                                                    </div>
                                                    {{-- <div class="shopping-bag-delivery "> --}}
                                                    {{-- <p class="mb-0"><strong
                                                                        class="shopping-bag-title">Pickup</strong></p>
                                                                <p class="mb-0"><strong
                                                                        class="shopping-bag-title">Free</strong>
                                                                </p> --}}
                                                    {{-- </div> --}}
                                                </div>
                                            </li>
                                            <li>
                                                <hr class="mt-2">
                                            </li>
                                            <li>
                                                <div class="save-for-later d-flex mt-1">
                                                    <button type="button" style="text-decoration: none:boder:none;">
                                                        <p class="save-remove-later me-4 mb-0"
                                                            onclick="addToFavirate({{ $projectBenefit->project_benefit->project->id }})">
                                                            Save for later</p>
                                                    </button>

                                                    <button type="button"
                                                        onclick="removeGoldevine({{ $projectBenefit->id }} , {{ $projectBenefit->project_benefit->price }} , {{ $projectBenefit->project_benefit->id }})"
                                                        class="mb-0" style="color: rgb(61, 60, 60)">
                                                        Remove
                                                    </button>

                                                    {{-- <button type="button" class="mb-0" style="color: rgb(61, 60, 60)"
                                                                onclick="removeFacirate({{ $projectBenefit->project->id }})">
                                                                Remove
                                                            </button> --}}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    </li>
                                    <li>
                                        <div class="shopping-bag-payment">
                                            <span
                                                class="payment-titles ">${{ number_format($projectBenefit->project_benefit->price) }}</span>
                                            <span class="px-1"> x </span>

                                            <div class="product-details-quantity border rounded d-inline-block me-3">
                                                <span class="input-number-decrement"
                                                    onclick="decrementstsgoldevine({{ $projectBenefit->project_benefit->id }} , {{ $projectBenefit->project_benefit->price }})"
                                                    style="cursor: pointer;
                                                                ">–</span><input
                                                    class="input-number quantitygoldevine{{ $projectBenefit->project_benefit->id }}"
                                                    type="text"
                                                    value="{{ $projectBenefit->project_benefit->quantity }}"
                                                    min="1" max="10" id="" readonly name="quantity[]"><span
                                                    class="input-number-increment"
                                                    onclick="incrementsgoldevine({{ $projectBenefit->project_benefit->id }} , {{ $projectBenefit->project_benefit->price }})">+</span>
                                            </div>

                                            {{-- <span class="border rounded px-1">{{ $projectBenefit->project_benefit->quantity }} </span> --}}

                                            <span>=</span>
                                            <span
                                                class="payment-titles totalPriceGoldevine{{ $projectBenefit->project_benefit->id }}">${{ number_format($projectBenefit->project_benefit->price * $projectBenefit->project_benefit->quantity) }}</span>
                                            <div class="appenddatagoldeive">
                                            </div>
                                        </div>
                                    </li>
                                    </ul>
                            </div>
                            @php
                                $totalPriceGoldevine += $projectBenefit->project_benefit->price * $projectBenefit->project_benefit->quantity;
                            @endphp
                            @endforeach

                        </div>

                        {{-- <div class="shopping-bag-component luxauro-subscription-currents mb-3">
                                <h3 class="mb-4">Gold Metal Guild</h3>
                                <ul
                                    class="subscriptions-produccts mb-4 p-0 list-unstyled d-flex align-items-self-start justify-content-between flex-wrap">
                                    <li>
                                        <div class="sub-product-image mb-3 mb-md-4">
                                            <img src="images/about01.png" class="img-fluid" alt="product-img">
                                        </div>
                                    </li>
                                    <li class="mx-2 mb-2"><strong>GMG Professional Gold Seal Special Title</strong>
                                        <div>
                                            <ul class="list-unstyled m-0 p-0">
                                                <li>
                                                    <p class="mb-0">Solid by merchant_username01</p>
                                                </li>
                                                <li>
                                                    <p class="mb-2"><span><i class="fa fa-map-marker me-2"
                                                                aria-hidden="true"></i></span>[Merchant Location]</p>
                                                </li>
                                                <li>
                                                    <p>[Product short description] Lorem ipsum is simply elit.</p>
                                                </li>
                                                <li>
                                                    <div class="shopping-bag-pickup d-flex">
                                                        <div class="shopping-bag-delivery me-3">
                                                            <strong class="shopping-bag-title">Delivery</strong>
                                                            <span class="estimated mb-2">Estimated Arrival:<span
                                                                    class="d-block"></span> Thurs, Feb 16</span>
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">$20</strong>
                                                            </p>
                                                        </div>
                                                        <div class="shopping-bag-delivery ">
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">Pickup</strong></p>
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">Free</strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr>
                                                </li>
                                                <li>
                                                    <div class="save-for-later d-flex">
                                                        <p class="save-remove-later me-4 mb-0">Save for later</p>
                                                        <p class="mb-0">Remove</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-bag-payment">
                                            <span class="payment-titles">$24.43</span>
                                            <span class="px-1"> x </span>
                                            <span class="border rounded px-1">3</span>
                                            <span>=</span>
                                            <span class="payment-titles">$73.97</span>
                                        </div>
                                    </li>
                                </ul>
                                <ul
                                    class="subscriptions-produccts mb-md-4 p-0 list-unstyled d-flex align-items-self-start flex-wrap justify-content-between">
                                    <li>
                                        <div class="sub-product-image mb-3 mb-md-4">
                                            <img src="images/about01.png" class="img-fluid" alt="product-img">
                                        </div>
                                    </li>
                                    <li class="mx-2 mb-2"><strong>GMG Professional Gold Seal Special Title</strong>
                                        <div>
                                            <ul class="list-unstyled m-0 p-0">
                                                <li>
                                                    <p class="mb-0">Solid by merchant_username02</p>
                                                </li>
                                                <li>
                                                    <p class="mb-2"><span><i class="fa fa-map-marker me-2"
                                                                aria-hidden="true"></i></span>[Merchant Location]</p>
                                                </li>
                                                <li>
                                                    <p>[Product short description] Lorem ipsum is simply elit.</p>
                                                </li>
                                                <li>
                                                    <div class="shopping-bag-pickup d-flex">
                                                        <div class="shopping-bag-delivery me-3">
                                                            <strong class="shopping-bag-title">Delivery</strong>
                                                            <span class="estimated mb-2">Estimated Arrival:<span
                                                                    class="d-block"></span> Thurs, Feb 16</span>
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">$20</strong>
                                                            </p>
                                                        </div>
                                                        <div class="shopping-bag-delivery ">
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">Pickup</strong></p>
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">Free</strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr>
                                                </li>
                                                <li>
                                                    <div class="save-for-later d-flex">
                                                        <p class="save-remove-later me-4 mb-0">Save for later</p>
                                                        <p class="mb-0">Remove</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-bag-payment">
                                            <span class="payment-titles">$24.43</span>
                                            <span class="px-1"> x </span>
                                            <span class="border rounded px-1">3</span>
                                            <span>=</span>
                                            <span class="payment-titles">$73.97</span>
                                        </div>
                                    </li>
                                </ul>
                                <ul
                                    class="subscriptions-produccts mb-0 p-0 list-unstyled d-flex align-items-self-start justify-content-between flex-wrap">
                                    <li>
                                        <div class="sub-product-image mb-3 mb-md-4">
                                            <img src="images/about01.png" class="img-fluid" alt="product-img">
                                        </div>
                                    </li>
                                    <li class="mx-2 mb-2"><strong>GMG Professional Gold Seal Special Title</strong>
                                        <div>
                                            <ul class="list-unstyled m-0 p-0">
                                                <li>
                                                    <p class="mb-0">Solid by merchant_username03</p>
                                                </li>
                                                <li>
                                                    <p class="mb-2"><span><i class="fa fa-map-marker me-2"
                                                                aria-hidden="true"></i></span>[Merchant Location]</p>
                                                </li>
                                                <li>
                                                    <p>[Product short description] Lorem ipsum is simply elit.</p>
                                                </li>
                                                <li>
                                                    <div class="shopping-bag-pickup d-flex">
                                                        <div class="shopping-bag-delivery me-3">
                                                            <strong class="shopping-bag-title">Delivery</strong>
                                                            <span class="estimated mb-2">Estimated Arrival:<span
                                                                    class="d-block"></span> Thurs, Feb 16</span>
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">$20</strong>
                                                            </p>
                                                        </div>
                                                        <div class="shopping-bag-delivery ">
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">Pickup</strong></p>
                                                            <p class="mb-0"><strong
                                                                    class="shopping-bag-title">Free</strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <hr>
                                                </li>
                                                <li>
                                                    <div class="save-for-later d-flex">
                                                        <p class="save-remove-later me-4 mb-0">Save for later</p>
                                                        <p class="mb-0">Remove</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-bag-payment">
                                            <span class="payment-titles">$24.43</span>
                                            <span class="px-1"> x </span>
                                            <span class="border rounded px-1">3</span>
                                            <span>=</span>
                                            <span class="payment-titles">$73.97</span>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                    </div>
                    <div class="col-12 col-md-4">
                        <h2 class="py-3">My Shopping Bag</h2>
                        <div class="shipping-my-order">
                            <div class="shopping-bag-my-order mb-5">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <strong>Luxauro Subtotal</strong>
                                    <strong class="luxaurosubtotal" data-subtotal="{{ $subtotal }}"
                                        id="luxarosubtotalsappend">${{ number_format($subtotal) }}</strong>
                                    <input
                                        type="hidden"name="luxaurosubtotal"class="luxaurosubtotal luxaurosubtotalappen"
                                        data-subtotal="{{ $subtotal }}" value="{{ $subtotal }} "
                                        id="luxarosubtotals">
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0">Estimated Shipping</p>
                                    <p class="mb-0 shiping" data-shiping="{{ $shipping_charge }}">
                                        ${{ $shipping_charge }}
                                    </p>
                                    <input type="hidden" name="shiping" class="shipingcharge"
                                        data-shiping="{{ $shipping_charge }}" value="{{ $shipping_charge }}">
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0">Sales Tax</p>
                                    <p class="mb-0">Calculated at Checkout</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="payment-titles">Total</span>
                                    <span class="payment-titles overalltotal"
                                        data-total="{{ $total }}">${{ number_format($total) }}</span>
                                    <input type="hidden" name="overalltotal" class="overalltotals"
                                        data-total="{{ $total }}" value="{{ $total }}">
                                    <input type="hidden" class="goldevineSubtotals" name="goldevinetotals" value="{{ $totalPriceGoldevine }}">
                                </div>
                                <button type="submit" class="btn btn-primary d-block w-100">LUXAURO CHECKOUT</button>
                            </div>
                            <div class="shopping-bag-my-order mb-5">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <strong>Goldevine Subtotal</strong>
                                    <strong class="goldevineSubtotal">${{ number_format($totalPriceGoldevine) }}</strong>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0">Estimated Shipping</p>
                                    <p class="mb-0">$40.00</p>
                                </div> --}}
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0">Sales Tax</p>
                                    <p class="mb-0">Calculated at Checkout</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="payment-titles">Total</span>
                                    <span
                                        class="payment-titles totalPricebag">${{ number_format($totalPriceGoldevine) }}</span>
                                </div>
                                <button class="btn btn-primary d-block w-100" type="submit">GOLDEVINE CHECKOUT</button>
                            </div>
                            {{-- <div class="shopping-bag-my-order mb-5">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <strong>Gold Metal Guild Subtotal</strong>
                                    <strong>$174.95</strong>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0">Estimated Shipping</p>
                                    <p class="mb-0">$40.00</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="mb-0">Sales Tax</p>
                                    <p class="mb-0">Calculated at Checkout</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="payment-titles">Total</span>
                                    <span class="payment-titles">$214.43</span>
                                </div>
                                <button class="btn btn-primary d-block w-100">GOLD METAL GUILD CHECKOUT</button>
                            </div> --}}
                            <button type="submit" class="btn btn-primary d-block w-100 mb-3">TRIBIRD CHECKOUT</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        function increments(id, price) {
            let qty = $('.addOrRemoves' + id).val();
            $('.addOrRemoves' + id).val(++qty);
            $('.price' + id).val(qty * price);
            $('.appendprice' + id).html('$' + qty * price);
            let luxarosubtotals1 = $('#luxarosubtotals').val();
            console.log(luxarosubtotals1);
            let luxaurosubtotal = parseFloat(luxarosubtotals1) + parseFloat(price);
            console.log(luxaurosubtotal);
            $('#luxarosubtotalsappend').html('$' + luxaurosubtotal.toFixed(2));
            $('.luxaurosubtotalappen').val(luxaurosubtotal.toFixed(2));
            let shipingcharge = $('.shipingcharge').val();
            let overalltotal = parseFloat(luxaurosubtotal) + parseFloat(shipingcharge);
            $('.overalltotal').html('$' + overalltotal.toFixed(2));
        }

        function decrements(id, price) {
            let qty = $('.addOrRemoves' + id).val();
            if (qty > 1) {

                $('.addOrRemoves' + id).val(--qty);
                $('.price' + id).val(qty * price);
                $('.appendprice' + id).html('$' + qty * price);
                let luxarosubtotals1 = $('#luxarosubtotals').val();
                console.log(luxarosubtotals1);
                let luxaurosubtotal = parseFloat(luxarosubtotals1) - parseFloat(price);
                console.log(luxaurosubtotal);
                $('#luxarosubtotalsappend').html('$' + luxaurosubtotal.toFixed(2));
                $('.luxaurosubtotalappen').val(luxaurosubtotal.toFixed(2));
                let shipingcharge = $('.shipingcharge').val();
                let overalltotal = parseFloat(luxaurosubtotal) + parseFloat(shipingcharge);
                $('.overalltotal').html('$' + overalltotal.toFixed(2));
            } else {
                // $('.addOrRemoves' + id).val(1);
                // $('.price' + id).val(price);
                // $('.appendprice' + id).html('$' + price);
                // let luxarosubtotals1 = $('#luxarosubtotals').val();
                // console.log(luxarosubtotals1);
                // let luxaurosubtotal = parseFloat(luxarosubtotals1) - parseFloat(price);
                // console.log(luxaurosubtotal);
                // $('#luxarosubtotalsappend').html('$' + luxaurosubtotal.toFixed(2));
                // $('.luxaurosubtotalappen').val(luxaurosubtotal.toFixed(2));
                // let shipingcharge = $('.shipingcharge').val();
                // let overalltotal = parseFloat(luxaurosubtotal) + parseFloat(shipingcharge);
                // $('.overalltotal').html('$' + overalltotal.toFixed(2));
            }
        }
    </script>

    <script>
        function addToFavirate(id) {
            $.ajax({
                url: "{{ route('addToFavirate') }}",
                type: "GET",
                data: {
                    "project_id": id,
                },
                success: function(response) {
                    if (response.success) {
                        swal("Success", response.success, "success");

                    } else {
                        swal("Error", response.error, "error");
                    }

                }
            });
        }

        function removeFacirate(id) {
            $.ajax({
                url: "{{ route('removeFacirates') }}",
                type: "GET",
                data: {
                    "project_id": id,
                },
                success: function(response) {
                    if (response.success == null) {
                        swal("Error", "This Project Not Add to Favorite", "error");
                    } else {
                        swal("Success", response.success, "success");
                    }
                }
            });
        }


        function decrementstsgoldevine(id, price) {

            var quantity = $('.quantitygoldevine' + id).val();
            var goldevineSubtotals = $('.goldevineSubtotals').val();
            if (quantity > 1) {
                quantity--;
                $('.quantitygoldevine' + id).val(quantity);
                $('.goldevineSubtotals').val(goldevineSubtotals - price);
                let subtotal = goldevineSubtotals - price;
                $('.totalPriceGoldevine' + id).text('$' + quantity * price);
                $('.goldevineSubtotal').text('$' + subtotal);
                $('.totalPricebag').text('$' + subtotal);

            }

        }

        function incrementsgoldevine(id, price) {
            var quantity = $('.quantitygoldevine' + id).val();
            var goldevineSubtotals = $('.goldevineSubtotals').val();
            quantity++;
            $('.quantitygoldevine' + id).val(quantity);
            $('.goldevineSubtotals').val(parseFloat(goldevineSubtotals) + parseFloat(price));
            let subtotal = parseFloat(goldevineSubtotals) + parseFloat(price);
            $('.totalPriceGoldevine' + id).text('$' + quantity * price);
            $('.goldevineSubtotal').text('$' + subtotal);
            $('.totalPricebag').text('$' + subtotal);

        }

        function removeGoldevine(id, price, tempid) {
            var goldevineSubtotals = $('.goldevineSubtotals').val();
            let quentity = $('.quantitygoldevine' + tempid).val();
            $.ajax({
                url: "{{ route('removeGoldevineproject') }}",
                type: "GET",
                data: {
                    id: id,
                },
                success: function(response) {
                    swal("Success", response.success, "success");
                    let = subtotal = goldevineSubtotals - price * quentity;
                    $('.goldevineSubtotal').text('$' + subtotal);
                    $('.totalPricebag').text('$' + subtotal);
                    $('.removebenefit' + id).remove();
                    // $('.goldevineSubtotal').text('$' + response.totalgoldenvine);
                    // $('.totalPricebag').text('$' + response.totalgoldenvine);

                }
            });

        }
    </script>
@endsection
