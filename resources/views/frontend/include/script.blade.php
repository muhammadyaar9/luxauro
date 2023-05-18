<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

@if (session('success'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "Ok",
        });
    </script>
@endif
@if (session('error'))
    <script>
        swal({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            button: "Ok",
        });
    </script>
@endif
<script>
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 3000);

    function appendProducts(selectObject) {
        var filterValue = selectObject.value;
        var id = filterValue.substr(filterValue.length - 1);
        $.ajax({
            type: 'GET',
            url: "{{ route('appendProducts') }}",
            data: {
                price_filter: filterValue
            },
            success: function(data) {
                if ($('#product-append' + id).hasClass('slick-initialized')) {
                    $('#product-append' + id).slick('unslick');
                    $('#product-append' + id).html('');
                }
                $('#product-append' + id).html(null);
                $('#product-append' + id).append(data);
                $('#product-append' + id).slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrows: true,
                    focusOnSelect: true,
                    autoplay: false,
                    mobileFirst: true,
                    prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
                    nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    }, {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 1,
                        }
                    }]
                });
            },
        });
    }

    function appendCategories(selectObject) {
        var filterValue = selectObject.value;
        var id = filterValue.substr(filterValue.length - 1);
        $.ajax({
            type: 'GET',
            url: "{{ route('appendCategories') }}",
            data: {
                category_filter: filterValue
            },
            success: function(data) {
                $('#category-append').html(null);
                $('#category-append').html(data);
                $('#category-append').css({
                    "display": "flex"
                });
            }
        });
    }

    function appendCharters(selectObject) {
        var filterValue = selectObject.value;
        $.ajax({
            type: 'GET',
            url: "{{ route('appendCharters') }}",
            beforeSend: function() {
                $('#charter-append').html('');
                if ($('#charter-append').hasClass('slick-initialized')) {
                    $('#charter-append').html('');
                    $('.filterGoldevines').html('');
                    $('#charter-append').show();
                } else {
                    $('#charter-append').show();
                }
                $('#charter-append').html(
                    '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                );
            },
            data: {
                charter: filterValue
            },
            success: function(data) {
                if ($('.appendCharter').hasClass('slick-initialized')) {
                    $('.appendCharter').slick('unslick');
                    $('.appendCharter').html('');
                }
                $('.appendCharter').append(data);
                $('.appendCharter').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrows: true,
                    focusOnSelect: true,
                    autoplay: false,
                    mobileFirst: true,
                    prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
                    nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    }, {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 1,
                        }
                    }]
                });

            },
            complete: function() {
                $('#charter-append').hide();
            }
        });
    }

    function appendLocalLuxauro(selectObject) {
        var filterValue = selectObject.value;
        $.ajax({
            type: 'GET',
            url: "{{ route('appendLocalLuxauro') }}",
            data: {
                products: filterValue
            },
            success: function(data) {
                $('#local-luxaro-append').html(null);
                $('#local-luxaro-append').html(data);
                $('#local-luxaro-append').css({
                    "display": "flex"
                });
            }
        });
    }
</script>

<script>
    $('.openLuxaroSidebar').click(function() {
        $('.common').addClass('close');
        $('.common').removeClass('show');
        $('.LuxaroSidebar').addClass('show');
        $('.LuxaroSidebarbtn').addClass('show');
    });
    $('.openGoldEvineSidebar').click(function() {
        $('.common').addClass('close');
        $('.common').removeClass('show');
        $('.GoldEvineSidebar').addClass('show');
        $('.GoldEvineSidebarbtn').addClass('show');
    });
    $('.openGMGSidebar').click(function() {
        $('.common').addClass('close');
        $('.common').removeClass('show');
        $('.GMGSidebar').addClass('show');
        $('.GMGSidebarbtn').addClass('show');
    });

    function increment(id) {
        var value = $('.addOrRemove'+id).val();
        value = isNaN(value) ? 0 : value;
        value++;
        $('.addOrRemove'+id).val(value);
    }

    function decrement(id) {
        var value = $('.addOrRemove'+id).val();
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        if (value > 1) {
            value--;
        }
        $('.addOrRemove'+id).val(value);
    }

    function addToCart(product_id, name, price) {
        var quantity = $('.addOrRemove'+product_id).val();
        var total = price * quantity;
        $.ajax({
            type: "GET",
            url: "{{ route('addtocart') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                product_id: product_id,
                name: name,
                price: price,
                quantity: quantity,
                total: total
            },
            dataType: "json",
            success: function(response) {

                if (response.success == 'Product Already Added To Cart.') {
                    swal({
                        title: "Error!",
                        text: response.success,
                        icon: "error",
                        button: "Ok",

                    });
                } else if (response.success == 'Product updated To Cart Successfully') {

                    swal({
                        title: "Success!",
                        text: response.success,
                        icon: "success",
                        button: "Ok",
                    });
                    $('.destroy' + response.id).html('');
                    $('.destroy' + response.id).html('<div class="row destroy' + response.id +
                        ' py-1"> <div class="col-1 px-1"> <span class=""> <img src="' + response.product
                        .image +
                        '" height="50px" width="50px" alt=""> </span> </div><div class="col-4 px-1"> <span>' +
                        response.cart.name +
                        '</span> </div><div class="col-1"> </div><div class="col-2 px-1"> <span>$' +
                        response.product.product_price +
                        '</span> </div><div class="col-1 px-1"> <span> <i class="fa fa-times"aria-hidden="true"></i></span> </div><div class="col-1 px-1"> <span>' +
                        response.cart.quantity +
                        '</span> </div><div class="col-1 px-1"> <span>=</span> </div><div class="col-1 px-1"> <span class="">$' +
                        response.cart.price * response.cart.quantity + '</span> </div></div>');
                    $('.totalprice').html('');
                    $('.totalprice').append(
                        '<div class="row px-1"> <div class="col-9"></div><div class="col-1"> <span> Total </span> </div><div class="col-1"> <span>=</span> </div><div class="col-1"> <span class="mx-1"> $' +
                        response.total + '</span> </div></div>');
                    $('.CartCount').html('');
                    $('.CartCount').append(response.count);
                } else {
                    console.log(response);
                    swal({
                        title: "Success!",
                        text: response.success,
                        icon: "success",
                        button: "Ok",
                    });
                    $('.catdata').append('<div class="row destroy' + response.id +
                        ' py-1"> <div class="col-1 px-1"> <span class=""> <img src="' + response
                        .product
                        .image +
                        '" height="50px" width="50px" alt=""> </span> </div><div class="col-4 px-1"> <span>' +
                        response.cart.name +
                        '</span> </div><div class="col-1"> </div><div class="col-2 px-1"> <span>$' +
                        response.product.product_price +
                        '</span> </div><div class="col-1 px-1"> <span> <i class="fa fa-times"aria-hidden="true" ></i></span> </div><div class="col-1 px-1"> <span>' +
                        response.cart.quantity +
                        '</span> </div><div class="col-1 px-1"> <span>=</span> </div><div class="col-1 px-1"> <span class="">$' +
                        response.cart.price * response.cart.quantity + '</span> </div></div>');

                    $('.totalprice').html('');
                    $('.totalprice').append(
                        '<div class="row px-1"> <div class="col-9"></div><div class="col-1"> <span> Total </span> </div><div class="col-1"> <span>=</span> </div><div class="col-1"> <span class="mx-1"> $' +
                        response.total + '</span> </div></div>');
                    $('.CartCount').html('');
                    $('.CartCount').append(response.count);
                }


            }

        });


    }

    function orderdestroy(destroy_id) {
        $.ajax({
            type: "GET",
            url: "{{ route('orderdestroy') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                destroy_id: destroy_id,
            },
            dataType: "json",
            success: function(response) {
                $('.destroy' + destroy_id).html('');
                $('.CartCount').html('');
                $('.CartCount').append(response.count);
                $('.totalprice').html('');
                if (response.total == 0) {} else {
                    // $('.totalprice').append(
                    //     '<div class="row px-1"><div class="col-8"></div><div class="col-3"><span class="mx-1">Total=$' +
                    //     response.total + '</span></div><div class="col-1"></div></div>');
                    $('.totalprice').append(
                        '<div class="row px-1"> <div class="col-9"></div><div class="col-1"> <span> Total </span> </div><div class="col-1"> <span>=</span> </div><div class="col-1"> <span class="mx-1"> $' +
                        response.total + '</span> </div></div>');
                };
                swal({
                    title: "Success!",
                    text: response.success,
                    icon: "success",
                    button: "Ok",
                });
            }

        });
    }

    function orderdestroycheckout(destroy_id, producttotal, deliverycharges) {
        var destroy_id = destroy_id;
        var subtotal = $('.luxaurosubtotal').attr('data-subtotal');
        var shiping = $('.shiping').attr('data-shiping');
        var overalltotal = $('.overalltotal').attr('data-total');
        $.ajax({
            url: "{{ route('order.destroycheckout') }}",
            method: "GET",
            data: {
                destroy_id: destroy_id
            },
            success: function(data) {
                if (data.status == 'success') {
                    $('.allcartitem' + destroy_id).html('');
                    var subtotals = subtotal - producttotal;
                    var shipings = shiping - deliverycharges;
                    // console.log(shipings);
                    var overalltotals = overalltotal - producttotal;
                    $('.luxaurosubtotal').html('$' + subtotals);
                    $('.shiping').html('$' + shipings);
                    $('.overalltotal').html('$' + overalltotals);
                    $('.luxaurosubtotal').attr('data-subtotal', subtotals);
                    $('.shiping').attr('data-shiping', shipings);
                    $('.overalltotal').attr('data-total', overalltotals);
                    $('.destroy' + destroy_id + '').html('');
                    $('.CartCount').html('');
                    $('.CartCount').append(data.count);
                    $('.totalprice').html('');
                    $('.shipingcharge').val(shipings);
                    if (data.total == 0) {} else {
                        $('.totalprice').append(
                            '<div class="row px-1"><div class="col-8"></div><div class="col-3"><span class="mx-1">Total=$' +
                            data.total + '</span></div><div class="col-1"></div></div>');
                    }
                    swal({
                        title: "Success!",
                        text: data.success,
                        icon: "success",
                        button: "Ok",
                    });


                }

            }
        });

    }
    // $(document).on('change', '.goldeinefilteras', function() {

    // Code to execute when the input value changes
    // });



    // $(document).ready(function() {
    //     $('.goldeinefilteras').change(function(e) {
    //         e.preventDefault();
    //         alert('hello');
    //         $.ajax({
    //             url: "{{ route('filterGoldevine') }}",
    //             type: "GET",
    //             data: {
    //                 filter: filter
    //             },
    //             success: function(data) {
    //                 $('.appendFilterData').html('');
    //                 $('.classAppendgoldevine').slider('destroy');
    //                 $('.classAppendgoldevine').slider();
    //                 data.forEach(element => {
    //                     $('.filterGoldevines').append(element);
    //                     console.log(element);
    //                 });
    //             }
    //         });

    //     });
    //     // $j("#classAppendgoldevine").slider();
    // });

    // function filterGoldevine() {
    //     var filter = $('#goldeinefilter').val();

    // }
</script>

<script>
    $(window).on('load', function() {
        // $( '#ckeditor-textarea' ).ckeditor();
        CKEDITOR.replace('description');
    });

    $(document).ready(function() {});
</script>

<script>
    function goldeinefilteras() {
        $('.appendFilterData').html('');
        $('.filterGoldevines').html('');
        let filter = $('.goldeinefiltera').val();
        $.ajax({
            url: "{{ route('filterGoldevine') }}",
            type: "GET",
            data: {
                filter: filter
            },
            beforeSend: function() {
                $('.appendFilterData').html('');
                if ($('.appendFilterData').hasClass('slick-initialized')) {
                    $('.appendFilterData').html('');
                    $('.filterGoldevines').html('');
                    $('.appendFilterData').show();
                } else {
                    $('.appendFilterData').show();
                }
                $('.appendFilterData').html(
                    '<div class="text-center " style="height:299px;"><div class="spinner-border" role="status" style="color:#133033 !importent ; width: 5rem; height: 5rem;"> <span class="visually-hidden">Loading...</span> </div></div>'
                );
            },
            success: function(data) {
                if ($('.filterGoldevines').hasClass('slick-initialized')) {
                    $('.filterGoldevines').slick('unslick');
                    $('.appendFilterData').html('');
                    $('.filterGoldevines').html('');

                } else {
                    $('.appendFilterData').html('');
                    $('.filterGoldevines').html('');
                }
                data.forEach(element => {
                    $('.filterGoldevines').append(element);
                });

                // check if the element has a Slick slider initialized
                if ($('.filterGoldevines').hasClass('slick-initialized')) {
                    $('.filterGoldevines').slick('unslick');
                }

                $('.filterGoldevines').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false,
                    arrows: true,
                    focusOnSelect: true,
                    autoplay: false,
                    mobileFirst: true,
                    prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
                    nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    }, {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 1,
                        }
                    }]
                });
            },
            complete: function() {
                $('.appendFilterData').hide();
            }
        });

    }
    // $('.goldeinefilteras').change(function(e) {
    //     e.preventDefault();
    //     alert('hello');

    // });



    // $('.goldeinefilteras').change(function(e) {
    //     e.preventDefault();
    //     let filter = $(this).val();
    //     $.ajax({
    //         url: "{{ route('filterGoldevine') }}",
    //         type: "GET",
    //         data: {
    //             filter: filter
    //         },
    //         success: function(data) {
    //             console.log(data);
    //             $('.appendFilterData').html('');
    //             $('.filterGoldevines').html('');
    //             data.forEach(element => {
    //                 $('.filterGoldevines').append(element);
    //             });
    //             $('.filterGoldevines').slick({
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1,
    //                 infinite: true,
    //                 dots: false,
    //                 arrows: true,
    //                 focusOnSelect: true,
    //                 autoplay: false,
    //                 mobileFirst: true,
    //                 prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
    //                 nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
    //                 responsive: [{
    //                     breakpoint: 768,
    //                     settings: {
    //                         slidesToShow: 4,
    //                         slidesToScroll: 1,
    //                     }
    //                 }, {
    //                     breakpoint: 992,
    //                     settings: {
    //                         slidesToShow: 6,
    //                         slidesToScroll: 1,
    //                     }
    //                 }]
    //             });
    //         }
    //     });
    // });

    // function testslider() {
    //     $('.slider').slick({
    //         slidesToShow: 2,
    //         slidesToScroll: 1,
    //         infinite: true,
    //         dots: false,
    //         arrows: true,
    //         focusOnSelect: true,
    //         autoplay: false,
    //         mobileFirst: true,
    //         prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
    //         nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
    //         responsive: [{
    //             breakpoint: 768,
    //             settings: {
    //                 slidesToShow: 4,
    //                 slidesToScroll: 1,
    //             }
    //         }, {
    //             breakpoint: 992,
    //             settings: {
    //                 slidesToShow: 6,
    //                 slidesToScroll: 1,
    //             }
    //         }]
    //     });

    // }

    // $(document).ready(function() {
    //     $('.filterGoldevines').on('load', function() {
    //         alert();
    //     });
    // });

    // window.onload = function() {
    //     $('.filterGoldevines').addClass('slick-initialized slick-slider');
    // };
</script>
<script>
    $(document).ready(function() {
        $('.nationalShop').change(function(e) {
            e.preventDefault();
            let nationalShop = $('.nationalShop').val();
            $.ajax({
                type: "GET",
                url: "{{ route('nationalShop') }}",
                data: {
                    nationalShop: nationalShop
                },
                success: function(data) {
                    console.log(data);

                    if ($('.nationshopdiv').hasClass('slick-initialized')) {
                        $('.nationshopdiv').slick('unslick');
                        $('.nationshopdiv').html('');
                    }
                    if ($('.nationalShopFilter').hasClass('slick-initialized')) {
                        $('.nationalShopFilter').slick('unslick');
                        $('.nationalShopFilter').html('');
                    }
                    $('.nationalShopFilter').html('');
                    $('.nationshopdiv').html('');
                    $('.nationalShopFilter').html(data);
                    $('.nationalShopFilter').slick({
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false,
                        arrows: true,
                        focusOnSelect: true,
                        autoplay: false,
                        mobileFirst: true,
                        prevArrow: "<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
                        nextArrow: "<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
                        responsive: [{
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1,
                            }
                        }, {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 6,
                                slidesToScroll: 1,
                            }
                        }]
                    });
                }
            });

        });
    });
</script>
