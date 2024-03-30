<nav class="navbar navbar-expand-lg fixed-top py-0 tran-2 bg-white border shadow-3" id="navbar">
    <div class="container py-3">
        {{--        brand --}}
        <div class="w-25">
            <a class="navbar-brand p-0" href="{{ route('customer.home') }}">
                <img src="{{ asset('images/brand.png') }}" alt="Logo" height="40" class="rounded">
            </a>
        </div>
        {{--        navigation --}}
        <div class="justify-content-center w-50	d-none d-lg-flex">
            <ul class="navbar-nav mb-lg-0 w-100 justify-content-between">
                {{--                home --}}
                <li class="nav-item">
                    <a class="nav-link tran-2
                    {{ request()->routeIs('customer.home') ? 'active' : '' }}"
                       href="{{ route('customer.home') }}">Home</a>
                </li>
                {{--                rooms --}}
                <li class="nav-item">
                    <a class="nav-link tran-2
                    {{ request()->routeIs('customer.category') ? 'active' : '' }}"
                       href="{{ route('customer.category') }}">Categories</a>
                </li>
                {{-- services --}}
                <li class="nav-item">
                    <a class="nav-link tran-2
                    {{ request()->routeIs('customer.product') ? 'active' : '' }}"
                       href="{{ route('customer.product') }}">Products</a>
                </li>
                {{-- contact --}}
                <li class="nav-item">
                    <a class="nav-link tran-2
                    {{ request()->routeIs('customer.contact') ? 'active' : '' }}"
                       href="{{ route('customer.contact') }}">Contact</a>
                </li>
                {{-- about --}}
                <li class="nav-item">
                    <a class="nav-link tran-2
                    {{ request()->routeIs('customer.about') ? 'active' : '' }}"
                       href="{{ route('customer.about') }}">About Us</a>
                </li>

            </ul>
        </div>

        @guest('customer')
            {{--        login btn --}}
            <div class="w-25 d-flex justify-content-end	d-none d-lg-flex">
                <a class="btn btn-tertiary px-3 tran-2 me-2 rounded-9" href="{{ route('customer.login') }}"
                   data-mdb-ripple-init>
                    Log in
                </a>
                <a class="btn btn-primary px-3 tran-2 rounded-9" href="{{ route('customer.register') }}"
                   data-mdb-ripple-init>
                    Sign up
                </a>
            </div>
        @endguest

        @auth('customer')
            {{--        account btn --}}
            <div class="w-25 d-flex justify-content-end	d-none d-lg-flex">
                <a class="text-reset tran-2 me-3" href="{{ route('customer.products.cart') }}">
                    <i class="bi bi-cart"></i>
                </a>
                <!-- Icon -->
                <div class="dropdown me-3">
                    <a class="text-reset tran-2 dropdown-toggle hidden-arrow" aria-expanded="false" id="dropdown3"
                       data-mdb-toggle="dropdown" href="#" role="button">
                        <i class="bi bi-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="end-0 dropdown-menu dropright mt-0 tran-3 bg-white border shadow-sm animate slideIn"
                        aria-labelledby="dropdown3">
                        <li><a class="dropdown-item tran-2" href="#">Welcome back!</a></li>
                        <li><a class="dropdown-item tran-2" href="#">Book a room now for 20% sales off!</a>
                        </li>
                        <li><a class="dropdown-item tran-2" href="#">Account created successfully!</a></li>
                    </ul>
                </div>

                <!-- Notifications -->
                <div class="dropdown">
                    <a class="text-reset tran-2  dropdown-toggle hidden-arrow" aria-expanded="false" id="dropdown4"
                       data-mdb-toggle="dropdown" href="#" role="button">
                        <i class="bi bi-person"></i>
                    </a>
                    <ul class="end-0 dropdown-menu dropright mt-0 tran-3 bg-white border shadow-sm animate slideIn"
                        aria-labelledby="dropdown4">
                        <li><a class="dropdown-item tran-2" href="{{ route('customer.profile') }}">
                                <i class="bi bi-info-circle me-2"></i>My profile</a></li>
                        <li><a class="dropdown-item tran-2" href="{{ route('customer.orderHistory') }}">
                                <i class="bi bi-receipt me-2"></i>My bookings</a></li>
                        <li><a class="dropdown-item tran-2" href="{{ route('customer.profile') }}">
                                <i class="bi bi-gear me-2"></i>Settings</a></li>
                        <li>
                            <hr class="m-0">
                        </li>
                        <li><a class="dropdown-item tran-2" href="{{ route('customer.logout') }}">
                                <i class="bi bi-box-arrow-left me-2"></i>Sign out</a></li>
                    </ul>
                </div>
            </div>
            {{--        account btn --}}
        @endauth
    </div>
</nav>
