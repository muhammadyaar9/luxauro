$(".menu-btn").click(function(){
  $("#nav").toggleClass("active");
});

$('.banner-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  dots: false,
  arrows: true,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  prevArrow:"<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
  nextArrow:"<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>"
});


$('.banner-slider-3').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  dots: false,
    rows: 1,
  arrows: true,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  prevArrow:"<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
  nextArrow:"<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
  responsive: [{
    breakpoint: 768,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1,
    }
  },  {
    breakpoint: 992,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1,
    }
  }]
});

$('.slider').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  infinite: true,
  dots: false,
  arrows: true,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  prevArrow:"<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
  nextArrow:"<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
  responsive: [{
    breakpoint: 768,
    settings: {
      slidesToShow: 4,
      slidesToScroll: 1,
    }
  },  {
    breakpoint: 992,
    settings: {
      slidesToShow: 6,
      slidesToScroll: 1,
    }
  }]
});

$('.plus-new-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  dots: false,
  arrows: true,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  prevArrow:"<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
  nextArrow:"<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>",
  responsive: [{
    breakpoint: 768,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1,
    }
  },  {
    breakpoint: 992,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1,
    } 
    }, {
    breakpoint: 1200,
    settings: {
      slidesToShow: 4,
      slidesToScroll: 1,
    }

  }]
});

$('.product-detail-merchant').slick({
  rows: 2,
  dots: false,
  arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 6,
  slidesToScroll: 6
});

$('.detail-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  dots: false,
  arrows: false,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  asNavFor: '.detail-nav-slider',
});

$('.detail-nav-slider').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  infinite: true,
  dots: false,
  arrows: true,
  focusOnSelect: true,
  autoplay: false,
  mobileFirst: true,
  asNavFor: '.detail-slider',
  prevArrow:"<button type='button' class='slick-prev'><img src='images/arrow-left.png'></button>",
  nextArrow:"<button type='button' class='slick-next'><img src='images/arrow-next.png'></button>"
});

$("input[type=file]").change(function (e) {
  $(this).parents(".uploadFile").find(".filename").text(e.target.files[0].name);
});