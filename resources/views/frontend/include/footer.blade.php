
<div class="street-img">
    <img src="{{ asset('images/img1.png') }}" class="img-fluid">
</div>
<footer id="footer">
    <div class="container">
        <div class="footer-holder py-5">
            <div class="row">
                <div class="col-12 col-md-3 mb-3">
                    <div class="footer-logo mb-3">
                        <a href="javascript:void">
                            @if (strpos(url()->current(), 'goldEvine'))
                                <img src="{{ static_asset('images/GoldEvine-logo.png') }}" class="img-fluid">
                            @elseif(strpos(url()->current(), 'goldMetal'))
                                <img src="{{ static_asset('images/Gold-Metal-logo.png') }}" class="img-fluid">
                            @else
                                <img src="{{ static_asset('images/logo.png') }}" class="img-fluid">
                            @endif
                        </a>
                    </div>
                    <p class="mb-3 w-75">Lorem Ipsum dummy text of the printing typsting industry, lorem ipsum</p>
                    <a class="btn btn-sm btn-learn rounded-0 mb-3" href="javascript:void">Learn More</a>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <strong class="title d-block mb-4">Footer Menulist-1</strong>
                    <ul class="m-0">
                        <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                        <li><a href="{{ route('faqs') }}">FAQs</a></li>
                        <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <strong class="title d-block mb-4">Footer Menulist-2</strong>
                    <ul class="m-0">

                          @auth
                          <li>
                            <a  href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                          </li>
                          @else
                          @if (strpos(url()->current(), 'luxauro'))
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                          @endif

                            @if (strpos(url()->current(), 'goldEvines'))
                            <li><a href="{{ route('founderRegister') }}">Founder Register</a></li>
                            @elseif(strpos(url()->current(), 'goldMetal'))
                            <li><a href="{{ route('professionalRegister') }}">Professional Register</a></li>
                            @else
                            <li><a href="{{ route('vendorRegister') }}">Merchant Register</a></li>
                            @endif
                          @endauth
                    </ul>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <div>
                        <strong class="title d-inline-block mb-3 border-bottom">Social Icons</strong>
                        <ul class="list-unstyled m-0 p-0 d-flex align-items-center social-icons">
                            <li><a href="javascript:void"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:void"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="javascript:void"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="javascript:void"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="javascript:void"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="javascript:void"><i class="fa fa-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-4 d-flex justify-content-between">
            <span>Copyright @ 2022 <a href="javascript:void">Luxauro.</a> All rights reserved.</span>
            <ul class="list-unstyled m-0 p-0 d-flex">
                <li class="me-3"><a class="text-white" href="javascript:void">Terms & Condition</a></li>
                <li><a class="text-white" href="javascript:void">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
</footer>
