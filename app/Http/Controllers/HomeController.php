<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $totalOrders = Order::whereNotIn('order_status', [0,4])->count();
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();
        $totalRevenue = Order::whereNotIn('order_status',[0,4])
                        ->join('orders_details', 'orders.id', 'orders_details.order_id')
                        ->sum('orders_details.sold_price');
        // This month revenue
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $currentDate = Carbon::now()->format('Y-m-d');
        $currentDateName = Carbon::now()->format('M');

        $revenueThisMonth = Order::whereNotIn('order_status', [0,4])
                            -> whereDate('order_date', '>=', $startOfMonth)
                            -> whereDate('order_date', '<=', $currentDate)
                            ->join('orders_details', 'orders.id', 'orders_details.order_id')
                            -> sum('orders_details.sold_price');

        // Last month revenue
        $lastMonthStartDate = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $lastMonthEndDate = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
        $lastMonthName = Carbon::now()->subMonth()->startOfMonth()->format('M');
        $revenueLastMonth = Order::where('order_status', '!=', 4)
            -> whereDate('order_date', '>=', $lastMonthStartDate)
            -> whereDate('order_date', '<=', $lastMonthEndDate)
            -> sum('id');

        // Last 30 days sale
        $last30DayStartDate = Carbon::now()->subDay(30)->format('Y-m-d');
        $last30DayName = Carbon::now()->subDay(30)->format('d-m');
        $revenueLast30Days = Order::whereNotIn('order_status', [0,4])
            -> whereDate('order_date', '>=', $last30DayStartDate)
            -> whereDate('order_date', '<=', $currentDate)
            -> join('orders_details', 'orders.id', 'orders_details.order_id')
            -> sum('orders_details.sold_price');

        return view('admins.dashboard.index', [
            'totalOrders' => $totalOrders,
            'totalProducts' => $totalProducts,
            'totalCustomers' => $totalCustomers,
            'totalRevenue' => $totalRevenue,
            'revenueThisMonth' => $revenueThisMonth,
            'revenueLastMonth' => $revenueLastMonth,
            'revenueLast30Days' => $revenueLast30Days,
            'lastMonthName' => $lastMonthName,
            'last30DayName' => $last30DayName,
            'currentDateName' => $currentDateName
        ]);
    }
}
