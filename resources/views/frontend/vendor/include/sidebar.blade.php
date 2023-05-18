<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="mt-2 d-flex justify-content-around">
        @if (auth()->user()->status == 'Active')
      <span class="">Status:</span>  <span class="badge rounded-pill bg-success mx-3">{{ auth()->user()->status }}</span><br>
        @else
       <span>Status:</span> <span class="badge rounded-pill bg-danger mx-3">{{ auth()->user()->status }}</span><br>
        @endif
    </div>
        <div class="app-brand demo pt-0 mt-0">
        <a href="{{ route('vendorDashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ auth()->user()->shop_name }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('vendor-dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="mx-1 bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('account-request') ? 'active' : '' }}">
            <a href="{{ route('accountRequest') }}" class="menu-link">
                <i class="bi bi-unlock mx-1"></i>
                <div data-i18n="Analytics">Acount Request</div>
            </a>
        </li>

        <!-- Layouts -->

        @if (auth()->user()->status == 'Active' && auth()->user()->role == 'Vendor')
            <li
                class="menu-item {{ Request::is('category/create') || Request::is('category') || Request::is('delivory-option') || Request::is('delivory-option/create') || Request::is('shipping-type') || Request::is('shipping-type/create') || Request::is('product-type') || Request::is('product-type/create') || Request::is('product') || Request::is('product/create') || Request::is('category/*/edit') || Request::is('delivory-option/*/edit') || Request::is('shipping-type/*/edit') || Request::is('product/*/edit') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="bx bx-layout mx-1"></i>
                    <div data-i18n="Layouts">Product Management</div>
                </a>

                <ul class="menu-sub">
                    <li
                        class="menu-item {{ Request::is('') || Request::is('product/create') || Request::is('product/*/edit') ? 'active' : '' }}">
                        <a href="{{ route('vendor-product.index') }}" class="menu-link">
                            <div data-i18n="Blank">All Products</div>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item {{ Request::is('vendor-order-invoice/*') || Request::is('vendor-orders') ? 'active' : '' }}">
                <a href="{{ route('vendororders') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">Orders</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
<!-- / Menu -->
