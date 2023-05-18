<div class="accordion mb-4" id="accordionExample">
    <div class="accordion-item mb-2">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed common" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                USER DASHBOARD
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse common" aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body px-md-3">
                <ul class="mangement profile p-0 list-unstyled">
                    @auth
                        <li class="pb-1"><a href="{{ route('myaccount') }}">My Profile</a></li>
                        <li class="pb-1"><a href="{{ route('chatify') }}">Messages</a></li>
                    @endauth
                    <!-- <li class="pb-1"><a href="">My Favorite Products</a></li>
                    <li class="pb-1"><a href="">My product browsing history</a></li>
                    <li class="pb-1"><a href="">My Luxauro transaction history</a></li>
                    <li class="pb-1"><a href="">My product ratings</a></li>
                    <li class="pb-1"><a href="">My favorite goldevine projects</a></li>
                    <li class="pb-1"><a href="">My goldevine browsing history</a></li>
                    <li class="pb-1"><a href="">My goldevine transaction history</a></li>
                    <li class="pb-1"><a href="">My gmg professional contacts</a></li>
                    <li class="pb-1"><a href="">My gmg transaction history</a></li>
                    <li class="pb-1"><a href="">My gmg professional ratings</a></li> -->
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item mb-2">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button common" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                MY ACCOUNT
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse common" aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample">
            <div class="accordion-body px-4">
                <ul class="mangement profile p-0 list-unstyled">
                    <li class="pb-1"><a href="{{ route('myaccount') }}">My Profile</a></li>
                    <li class="pb-1"><a href="">my saved addresse</a></li>
                    <li class="pb-1"><a href="">my saved payment methods</a></li>
                    <li class="pb-1"><a href="">preference</a></li>
                    <li class="pb-1"><a href="">setting</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item mb-2">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed GoldEvineSidebarBtn common" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                aria-controls="collapseFour">
                GOLDEVINE SETUP
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse GoldEvineSidebar common" aria-labelledby="headingFour"
            data-bs-parent="#accordionExample">
            <div class="accordion-body px-4">
                <ul class="mangement profile p-0 list-unstyled">
                    <li class="pb-1"><a href="{{ route('my-profile') }}">My Profile</a></li>
                    <li class="pb-1"><a href="">Manage campaigns</a></li>
                    <li class="pb-1"><a href="{{ asset('suite-management') }}">Manage merchant suites</a></li>
                    <li class="pb-1"><a href="">manage gmg sale</a></li>
                    <li class="pb-1"><a href="">my saved addresse</a></li>
                    <li class="pb-1"><a href="">my saved payment methods</a></li>
                    <li class="pb-1"><a href="">preference</a></li>
                    <li class="pb-1"><a href="">setting</a></li>
                    <li class="pb-1 active"><a href="{{ route('createProject') }}"><strong> Create New Goldevine Project</strong></a></li>
                    <li class="pb-1 active"><a href="{{ route('allprojects') }}">My Project</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="accordion-item mb-2">
        <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed LuxaroSidebarBtn common" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                aria-controls="collapseFive">
                LUXAURO MERCHANT SUITE SETUP
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse LuxaroSidebar common" aria-labelledby="headingFive"
            data-bs-parent="#accordionExample">
            <div class="accordion-body px-4">
                <ul class="mangement profile p-0 list-unstyled">
                    <li class="pb-1"><a href="{{ route('merchant_account_first_step') }}">Lusauro Merchant
                            Application Form (1/2)</a></li>
                    <li class="pb-1"><a href="{{ route('suite-management') }}">suite Management</a></li>
                    <li class="pb-1"><a href="{{ route('merchant.myOrders') }}">My Orders</a></li>
                    <li class="pb-1"><a href="{{ route('product_management') }}"><strong>Product
                                Management</strong></a></li>
                    <li class="pb-1"><a href="{{ route('charter_management') }}"><strong>Charter
                                Management</strong></a></li>
                    <li class="pb-1"><a href="{{ route('payment-management') }}">Payment Management</a></li>
                    <li class="pb-1"><a href="#">Review & Submit Lusauro Merchant Application</a></li>
                    <li class="pb-1"><a href="#">Confirmation Code</a></li>
                    <li class="pb-1"><a href="#">Transaction history</a></li>
                    <li class="pb-1"><a href="#">Subscription Summary</a></li>
                    <li class="pb-1"><a href="#">Reviews & Ratting Summary</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item mb-2">
        <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed GMGSidebarbtn common" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                GMG PROFESSIONAL SETUP
            </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse GMGSidebar common" aria-labelledby="headingSix"
            data-bs-parent="#accordionExample">
            <div class="accordion-body px-4">
                <ul class="mangement profile p-0 list-unstyled">
                    <li class="pb-1"><a href="{{ route('my-profile') }}">My Profile</a></li>
                    <li class="pb-1"><a href="">Manage campaigns</a></li>
                    <li class="pb-1"><a href="">Manage merchant suites</a></li>
                    <li class="pb-1"><a href="">manage gmg sale</a></li>
                    <li class="pb-1"><a href="">my saved addresse</a></li>
                    <li class="pb-1"><a href="">my saved payment methods</a></li>
                    <li class="pb-1"><a href="">preference</a></li>
                    <li class="pb-1"><a href="">setting</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
