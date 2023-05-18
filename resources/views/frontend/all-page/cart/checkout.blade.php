@extends('frontend.layouts.app')
@section('title')
    <title>Checkout</title>
@endsection
@section('content')
    <div class="inner-content">
        <div class="shopping-bag-section mt-5">
            <div class="container">
                <form action="{{ route('projectcheckoutstore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-8 py-2">
                            <h2 class="py-3">My Shopping Bag</h2>
                            {{-- <div class="shopping-bag-component luxauro-subscription-currents mb-3">
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
                                                                    <strong
                                                                        class="shopping-bag-title">{{ $allcartorder->product->delivoryOption->title }}</strong>
                                                                    <span class="estimated mb-2">Estimated Arrival:<span
                                                                            class="d-block"></span>Thurs, Feb 16</span>
                                                                    <p class="mb-0"><strong
                                                                            class="shopping-bag-title">${{ $allcartorder->product->shipping_charge }}</strong>
                                                                    </p>
                                                                </div>
                                                                <div class="shopping-bag-delivery" style="cursor: pointer"
                                                                onclick="pickup({{ $allcartorder->id }})">
                                                                <p class="mb-0"><strong
                                                                        class="shopping-bag-title">Pickup</strong>
                                                                </p>
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
                                                    <span class="border rounded px-1">{{ $allcartorder->quantity }}</span>
                                                    <span>=</span>
                                                    <span
                                                        class="payment-titles">${{ $allcartorder->product->product_price * $allcartorder->quantity }}</span>
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


                            </div> --}}
                            <div class="shopping-bag-component luxauro-subscription-currents mb-3">
                                <h3 class="mb-4">Goldevine</h3>
                                <ul
                                    class="subscriptions-produccts mb-4 p-0 list-unstyled d-flex align-items-self-start justify-content-between flex-wrap">
                                    <li>
                                        <div class="sub-product-image mb-3 mb-md-4">
                                            <img src="{{ $projectBenefit->project->feature_image }}" width="200px"
                                                class="img-fluid" alt="product-img">
                                        </div>
                                        {{-- {{ dd($projectBenefit) }} --}}
                                    </li>
                                    <li class="mx-2 mb-2"><strong>{{ $projectBenefit->title }}</strong>
                                        <div>
                                            <ul class="list-unstyled m-0 p-0">
                                                <li>
                                                    <p class="mb-0">Solid by
                                                        {{ isset($projectBenefit->project->user->userDetails->name) ? $projectBenefit->project->user->userDetails->name : '' }}
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="mb-2"><span><i class="fa fa-map-marker me-2"
                                                                aria-hidden="true"></i></span>{{ isset($projectBenefit->project->user->userDetails->address) ? $projectBenefit->project->user->userDetails->address : '' }}
                                                    </p>
                                                </li>
                                                <li>
                                                    <p> Description:
                                                        {{ Str::words($projectBenefit->project->short_description, 10, '...') }}
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
                                                                    class="shopping-bag-title">${{ number_format($projectBenefit->price) }}</strong>
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
                                                                onclick="addToFavirate({{ $projectBenefit->project->id }})">
                                                                Save for later</p>
                                                        </button>

                                                        <a type="button" href="{{ route('goldEvine') }}" class="mb-0" style="color: rgb(61, 60, 60)">
                                                            Remove
                                                        </a>

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
                                            <span class="payment-titles ">${{ number_format($projectBenefit->price) }}</span>
                                            <span class="px-1"> x </span>

                                            <div class="product-details-quantity border rounded d-inline-block me-3">
                                                <span class="input-number-decrement" onclick="decrementstsgoldevine({{ $projectBenefit->id  }} , {{ $projectBenefit->price }})"
                                                    style="cursor: pointer;
                                                            ">–</span><input
                                                    class="input-number addOrRemovesGoldeive" type="text" value="{{ $projectBenefit->quantity }}"
                                                    min="1" max="10" id="" readonly><span
                                                    class="input-number-increment" onclick="incrementsgoldevine({{ $projectBenefit->id  }} , {{ $projectBenefit->price }})">+</span>
                                            </div>

                                            <span class="border rounded px-1">{{ $projectBenefit->quantity }} </span>

                                            <span>=</span>
                                            <span class="payment-titles totalPricebag">${{ number_format($projectBenefit->price * $projectBenefit->quantity) }}</span>
                                            <div class="appenddatagoldeive">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 py-2">
                            <h2 class="py-3">My Shopping Bag</h2>
                            <div class="shipping-my-order">
                                {{-- <div class="shopping-bag-my-order mb-5">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <strong>Luxauro Subtotal</strong>
                                        <strong class="luxaurosubtotal"
                                            data-subtotal="subtotal ">$ subtotal </strong>
                                        <input type="hidden"name="luxaurosubtotal"class="luxaurosubtotal"
                                            data-subtotal=" $subtotal " value=" $subtotal">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Estimated Shipping</p>
                                        <p class="mb-0 shiping" data-shiping=" $shipping_charge ">
                                            $shipping_charge
                                        </p>
                                        <input type="hidden" name="shiping" class="shipingcharge"
                                            data-shiping="shipping_charge " value="$shipping_charge ">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="mb-0">Sales Tax</p>
                                        <p class="mb-0">Calculated at Checkout</p>
                                    </div>
                                    <hr>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="payment-titles">Total</span>
                                        <span class="payment-titles overalltotal"
                                            data-total="}">$ total </span>
                                        <input type="hidden" name="overalltotal" class="overalltotal"
                                            data-total="total " value="total ">
                                    </div>
                                    <button type="submit" class="btn btn-primary d-block w-100">LUXAURO CHECKOUT</button>
                                </div> --}}

                                <div class="shopping-bag-my-order mb-5">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <strong>Goldevine Subtotal</strong>
                                        <strong class="goldevineSubtotal" >${{ number_format($projectBenefit->price * $projectBenefit->quantity) }}</strong>
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
                                            class="payment-titles " id="total">${{ number_format($projectBenefit->price * $projectBenefit->quantity) }}</span>
                                    </div>

                                    <input type="hidden" name="total" class="totalPrice"
                                        value="{{ $projectBenefit->price * $projectBenefit->quantity }}">
                                    <input type="hidden" name="benefit_id" value="{{ $projectBenefit->id }}">
                                    <input type="hidden" name="quantity" class="quantitygoldevine" value="{{ $projectBenefit->quantity }}">
                                    <input type="hidden" name="project_id" value="{{ $projectBenefit->project_id }}">

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

                                {{-- <button class="btn btn-primary d-block w-100 mb-3">TRIBIRD CHECKOUT</button> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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


        function decrementstsgoldevine(id , price)
        {
            var quantity = $('.quantitygoldevine').val();
            var totalPrice = $('.totalPrice').val();

            if(quantity > 1)
            {
                quantity--;
                $('.addOrRemovesGoldeive').val(quantity);
                $('.quantitygoldevine').val(quantity);
                $('.totalPrice').val(totalPrice - price);
                let subtotal = totalPrice - price;
                $('.totalPricebag').text('$'+subtotal);
                $('.goldevineSubtotal').text('$'+subtotal);
                $('#total').text('$'+subtotal);

            }

        }

        function incrementsgoldevine(id , price)
        {
            var quantity = $('.quantitygoldevine').val();
            var totalPrice = $('.totalPrice').val();
            quantity++;
            $('.addOrRemovesGoldeive').val(quantity);
            $('.quantitygoldevine').val(quantity);
            $('.totalPrice').val(parseInt(totalPrice) + parseInt(price));
            let subtotal = parseInt(totalPrice) + parseInt(price);
            $('.totalPricebag').text('$'+subtotal);
            $('.goldevineSubtotal').text('$'+subtotal);
            $('#total').text('$'+subtotal);

        }
    </script>
@endsection
