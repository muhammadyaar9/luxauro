<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Luxauro</span>

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('admin-dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons mx-1 bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->

        <li class="menu-item menu-link mt-3">
            <div data-i18n="Basic" style="font-size: 12px;">Luxauro Setup </div>
        </li>
        <li
            class="menu-item {{ Request::is('category/create') || Request::is('category') || Request::is('delivory-option') || Request::is('delivory-option/create') || Request::is('shipping-type') || Request::is('shipping-type/create') || Request::is('product-type') || Request::is('product-type/create') || Request::is('product') || Request::is('product/create') || Request::is('category/*/edit') || Request::is('delivory-option/*/edit') || Request::is('shipping-type/*/edit') || Request::is('product/*/edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class=" bx bx-layout mx-1"></i>
                <div data-i18n="Layouts">Product Management</div>
            </a>

            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::is('category/create') || Request::is('category') || Request::is('category/*/edit') ? 'active ' : '' }} ">
                    <a href="{{ route('category.index') }}" class="menu-link">
                        <div data-i18n="Without menu">All Category</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::is('delivory-option') || Request::is('delivory-option/create') || Request::is('delivory-option/*/edit') ? 'active' : '' }}">
                    <a href="{{ route('delivory-option.index') }}" class="menu-link">
                        <div data-i18n="Without navbar">All Delivery Option</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::is('shipping-type') || Request::is('shipping-type/create') || Request::is('shipping-type/*/edit') ? 'active' : '' }}">
                    <a href="{{ route('shipping-type.index') }}" class="menu-link">
                        <div data-i18n="Container">All Shipping Type</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::is('product-type') || Request::is('product-type/create') ? 'active' : '' }}">
                    <a href="{{ route('product-type.index') }}" class="menu-link">
                        <div data-i18n="Fluid">All Product Type</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::is('product') || Request::is('product/create') || Request::is('product/*/edit') ? 'active' : '' }}">
                    <a href="{{ route('product.index') }}" class="menu-link">
                        <div data-i18n="Blank">All Products</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bi bi-gear "></i>
                <div data-i18n="Layouts">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-items">
                    <a href="{{ route('website.header') }}" class="menu-link">
                        <div data-i18n="Without menu">{{ translate('Header') }}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('website.footer', ['lang' => App::getLocale()]) }}" class="menu-link">
                        <div data-i18n="Without navbar">{{ translate('Footer') }}</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::is('shipping-type') || Request::is('shipping-type/create') || Request::is('shipping-type/*/edit') ? 'active' : '' }}">
                    <a href="{{ route('website.pages', ['lang' => App::getLocale()]) }}" class="menu-link">
                        <div data-i18n="Container">{{ translate('Pages') }}</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Request::is('product-type') || Request::is('product-type/create') ? 'active' : '' }}">
                    <a href="{{ route('website.appearance') }}" class="menu-link">
                        <div data-i18n="Fluid">{{ translate('Appearance') }}</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bi bi-gear "></i>
                <div data-i18n="Layouts">Orders</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('order-invoice/*') || Request::is('order-show') ? 'active' : '' }}">
                    <a href="{{ route('order.show') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-collection"></i>
                        <div data-i18n="Basic">All Orders</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('my-order-invoice/*') || Request::is('my-order') ? 'active' : '' }}">
                    <a href="{{ route('order.myorder') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-collection"></i>
                        <div data-i18n="Basic">My Orders</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Cards -->
        <li class="menu-item {{ Request::is('all-merchant') ? 'active' : '' }}">
            <a href="{{ route('allVendor') }}" class="menu-link">
                {{-- <i class=" bx bx-collection"></i> --}}
                <i class=" menu-icon tf-icons bi bi-person-fill"></i>
                <div data-i18n="Basic">Murchant</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('banner') ? 'active' : '' }}">
            <a href="{{ route('banner.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">Banners</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('home-slider') || Request::is('home-slider/create')  ? 'active' : '' }}">
            <a href="{{ route('home-slider.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">Home Slider</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/contact-us')  ? 'active' : '' }}">
            <a href="{{ route('adminContactUs') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">Contact Us </div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('admin/about-us')  ? 'active' : '' }}">
            <a href="{{ route('about-us.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">About Us</div>
            </a>
        </li>

        <li class="menu-item menu-link mt-3">
            <div data-i18n="Basic" style="font-size: 12px;">Goldevine Setup</div>
        </li>

        <li class="menu-item {{ Request::is('admin-goudevine-project/create') || Request::is('admin-goudevine-project') || Request::is('admin-goudevine-project/*/edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="bi bi-projector mx-1"></i>
                <div data-i18n="Layouts">Project Management</div>
            </a>

            <ul class="menu-sub">

                {{-- <li
                    class="menu-item {{ Request::is('goldevine-category/create') || Request::is('category') || Request::is('category/*/edit') ? 'active ' : '' }} ">
                    <a href="{{ route('goldevine-category.index') }}" class="menu-link">
                        <div data-i18n="Without menu">All Category</div>
                    </a>
                </li> --}}

                <li
                    class="menu-item {{ Request::is('admin-goudevine-project/create')  || Request::is('admin-goudevine-project') || Request::is('admin-goudevine-project/*/edit') ? 'active ' : '' }} ">
                    <a href="{{ route('admin-goudevine-project.index') }}" class="menu-link">
                        <div data-i18n="Without menu">All Project</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Request::is('admin/contact-us')  ? 'active' : '' }}">
            <a href="{{ route('adminContactUs') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">Contact Us </div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/goldevine-about-us')  ? 'active' : '' }}">
            <a href="{{ route('goldevine-about-us.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">About Goldevine</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/goldevine-about-us')  ? 'active' : '' }}">
            <a href="{{ route('learn-about-tribrid.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">Learn About the Tribrid</div>
            </a>
        </li>


        <li class="menu-item {{ Request::is('admin/learn-about-gold')  ? 'active' : '' }}">
            <a href="{{ route('learn-about-gold.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">Learn About GOld</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('goldevine/goldevine-rule')  ? 'active' : '' }}">
            <a href="{{ route('goldevine-rule.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-boxes"></i>
                <div data-i18n="Basic">Golden Rules</div>
            </a>
        </li>

        {{-- <li
            class="menu-item {{ Request::is('admin-goudevine-product') || Request::is('admin-goudevine-product/create') || Request::is('admin-goudevine-product/*/edit') ? 'active' : '' }}">
            <a href="{{ route('admin-goudevine-product.index') }}" class="menu-link">
                <i class="bi bi-list-task menu-icon tf-icons"></i>
                <div data-i18n="Basic">Project Management</div>
            </a>
        </li> --}}



    </ul>
</aside>
<!-- / Menu -->
