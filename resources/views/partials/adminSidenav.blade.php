<div class="list-group list-group-light p-3 rounded-0">
    {{--    <div class="d-flex align-items-center">--}}
    {{--        <div--}}
    {{--            class="div-img overflow-hidden rounded-circle shadow">--}}
    {{--            <img--}}
    {{--                src="{{ $admin->image != "" ? asset('storage/admin/guest/' . $admin->image) : asset('images/noavt.jpg') }}"--}}
    {{--                alt="admin_avatar" class="img-fluid rounded-circle"/>--}}
    {{--        </div>--}}
    {{--        <div class="ms-3">--}}
    {{--            <div class="fw-bold">--}}
    {{--                {{ $admin->first_name . ' ' . $admin->last_name }}--}}
    {{--            </div>--}}
    {{--            @if(session()->has('admin'))--}}
    {{--                <div class="text-success fs-7">--}}
    {{--                    <i class="bi bi-circle-fill me-1"></i>Online--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="bg-image">
        <a href="{{route('customer.home')}}" class="d-flex align-items-center justify-content-between">
            <div class="w-25 overflow-hidden">
                <img src="{{asset('images/brand.png')}}" alt="logo" class="img-fluid rounded-5">
            </div>
            <h4 class="ms-3 w-75 fw-bold mb-0">Admin panel</h4>
        </a>
    </div>

    {{--    SEARCH--}}
    <div class="form-outline mt-3" data-mdb-input-init>
        <i class="bi bi-search trailing"></i>
        <input type="text" id="search_nav" class="form-control form-icon-trailing"/>
        <label class="form-label" for="search_nav">Search</label>
    </div>

    {{--    MASTER--}}
    <div class="text-uppercase fs-7 fw-bold py-3 text-primary">
        Master
    </div>

    <a href="{{ route('admin.dashboard') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2
    {{ request()->route()->getPrefix() == '/admin/dashboard' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-grid me-2"></i>Dashboard
    </a>

    <a href="{{ route('admin.dashboard') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2
    {{ request()->route()->getPrefix() == '/admin/statistic' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-speedometer2 me-2"></i>Statistics
    </a>

    {{--    HOTEL MANAGEMENT--}}
    <div class="text-uppercase fs-7 fw-bold py-3 text-primary">
        Store Management
    </div>

    <a href="{{ route('admin.brands') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2
{{ request()->route()->getPrefix() == '/admin/brand' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-bootstrap me-2"></i>Brands
    </a>

    <a href="{{ route('admin.categories') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2
{{ request()->route()->getPrefix() == '/admin/category' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-list me-2"></i>Categories
    </a>

    <a href="{{ route('admin.ages') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2
{{ request()->route()->getPrefix() == '/admin/age' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-cake me-2"></i>Ages
    </a>

    <a href="{{ route('admin.products') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2
       {{ request()->route()->getPrefix() == '/admin/product' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-box me-2"></i>Products
    </a>

    <a href="{{ route('admin.orders') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2
       {{ request()->route()->getPrefix() == '/admin/order' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-receipt me-2"></i>Orders
    </a>

    {{--    ACCOUNT MANAGEMENT--}}
    <div class="text-uppercase fs-7 fw-bold py-3 text-primary">
        Account Management
    </div>

    <a href="{{ route('admin.customers') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2 {{ request()->route()->getPrefix() == '/admin/guests' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-people me-2"></i>Admins
    </a>

    <a href="{{ route('admin.customers') }}"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2 {{ request()->route()->getPrefix() == '/admin/guests' ? 'active' : '' }}"
       data-mdb-ripple-init aria-current="true">
        <i class="bi bi-people me-2"></i>Customers
    </a>

    {{--    OTHER--}}
    <div class="text-uppercase fs-7 fw-bold py-3 text-primary">
        Other
    </div>

    {{--    <a href="{{ route('admin.settings') }}"--}}
    {{--       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2--}}
    {{--     {{ request()->route()->getPrefix() == '/admin/settings' ? 'active' : '' }}"--}}
    {{--       data-mdb-ripple-init aria-current="true">--}}
    {{--        <i class="bi bi-gear me-2"></i>Settings--}}
    {{--    </a>--}}

    <a href="#logoutModal"
       class="list-group-item list-group-item-action d-flex align-items-center px-3 border-0 py-2 text-danger"
       data-mdb-ripple-init aria-current="true" data-mdb-modal-init>
        <i class="bi bi-box-arrow-left me-2"></i>Logout
    </a>
</div>

<!-- DeleteModal -->
<div class="modal slideUp" id="logoutModal" tabindex="-1"
     aria-labelledby="logoutModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="logoutModalLabel">
                    <i class="bi bi-exclamation-circle me-2"></i>Confirmation
                </h5>
                <button type="button" class="btn-close" data-mdb-ripple-init
                        data-mdb-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">Do you really want to logout?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light rounded-9" data-mdb-ripple-init
                        data-mdb-dismiss="modal">Cancel
                </button>
                <form method="get"
                      action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-danger rounded-9" data-mdb-ripple-init>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
