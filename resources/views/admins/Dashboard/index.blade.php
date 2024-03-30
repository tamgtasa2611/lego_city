@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Dashboard Manager</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 500px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>
        <section class="content pt-5">
            <div class="container-fluid justify-content-between w-100 pt-5" style="width: 500px">
                <h1 class="me-sm-5 text-white">Dashboard</h1>
                <div class="row pt-5">

{{--                            Total Order            --}}
                    <div class="col-lg-4 col-6 w-25 p-4">
                        <div class="small-box card p-3 text-white" style="background-color: #f75990">
                            <div class="inner">
                                <h3>{{$totalOrders}}</h3>
                                <p>Total Orders</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer text-white">More info<i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
{{--                            Total Product            --}}
                    <div class="col-lg-4 col-6 w-25 p-4">
                        <div class="small-box card p-3" style="background-color: #e8f9fd">
                            <div class="inner">
                                <h3>{{$totalProducts}}</h3>
                                <p>Total Products</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-box"></i>
                            </div>
                            <a href="{{route('admin.product')}}" class="footer text-dark">More info<i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
{{--                            Total Customer            --}}
                    <div class="col-lg-4 col-6 w-25 p-4">
                        <div class="small-box card p-3" style="background-color: #59ce8f">
                            <div class="inner">
                                <h3>{{$totalCustomers}}</h3>
                                <p>Total Customers</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <a href="{{route('admin.customer')}}" class="small-box-footer text-dark">More info<i class="bi bi-arrow-right-circle"></i></a>
                        </div>
                    </div>
                    {{--                            Total revenue            --}}
                    <div class="col-lg-4 col-6 w-25 p-4">
                        <div class="small-box card p-3" style="background-color: #fbe3e8">
                            <div class="inner">
                                <h3>${{number_format($totalRevenue, 2)}}</h3>
                                <p>Total Sale</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <a href="#" class="small-box-footer text-dark">&nbsp;</a>
                        </div>
                    </div>
                    {{--                            Total revenue this month           --}}
                    <div class="col-lg-4 col-6 w-25 p-4">
                        <div class="small-box card p-3" style="background-color: #5cbdb9">
                            <div class="inner">
                                <h3>${{number_format($revenueThisMonth, 2)}}</h3>
                                <p>Revenue This Month ({{$currentDateName}})</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-clipboard2-data-fill"></i>
                            </div>
                            <a href="#" class="small-box-footer text-dark">&nbsp;</a>
                        </div>
                    </div>
                    {{--                            Total revenue last month           --}}
                    <div class="col-lg-4 col-6 w-25 p-4">
                        <div class="small-box card p-3" style="background-color: #fceed1">
                            <div class="inner">
                                <h3>${{number_format($revenueLastMonth, 2)}}</h3>
                                <p>Revenue Last Month ({{$lastMonthName}})</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-clipboard2-data-fill"></i>
                            </div>
                            <a href="#" class="small-box-footer text-dark">&nbsp;</a>
                        </div>
                    </div>
                    {{--                            Total revenue last 30 days           --}}
                    <div class="col-lg-4 col-6 w-25 p-4">
                        <div class="small-box card p-3" style="background-color: #f2d53c">
                            <div class="inner">
                                <h3>${{number_format($revenueLast30Days, 2)}}</h3>
                                <p>Revenue Last 30 Days ({{$last30DayName}})</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-clipboard2-data-fill"></i>
                            </div>
                            <a href="#" class="small-box-footer text-dark">&nbsp;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--  js close button modal  -->

    <script src="//unpkg.com/alpinejs" defer></script>
</div>

</body>

<x-flash-message/>


