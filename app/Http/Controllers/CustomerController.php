<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Requests\StoreCustomerRequest;
use App\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class CustomerController extends Controller
{
    //trang admin
    public function show()
    {
        $customers = Customer::paginate(6);
        return view("admins.customer_manager.index", [
            "customers" => $customers
        ]);
    }

    public function create()
    {
        return view('admins.customer_manager.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        if ($request->validated()) {
            $array = [];
            $array = Arr::add($array, 'first_name', $request->first_name);
            $array = Arr::add($array, 'last_name', $request->last_name);
            $array = Arr::add($array, 'email', $request->email);
            $array = Arr::add($array, 'password', $request->password);
            $array = Arr::add($array, 'phone_number', $request->phone_number);
            $array = Arr::add($array, 'address', $request->address);
            //Lấy dữ liệu từ form và lưu lên db
            Customer::create($array);

            return Redirect::route('admin/customer')->with('success', 'Add a customer successfully!');
        }
    }

    public function edit(Customer $customer)
    {
        return view('admins.customer_manager.edit', [
            "customer" => $customer
        ]);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //Lấy dữ liệu trong form và update lên db
        $array = [];
        $array = Arr::add($array, 'first_name', $request->first_name);
        $array = Arr::add($array, 'last_name', $request->last_name);
        $array = Arr::add($array, 'email', $request->email);
        $array = Arr::add($array, 'password', $request->password);
        $array = Arr::add($array, 'phone_number', $request->phone_number);
        $array = Arr::add($array, 'address', $request->address);
        $customer->update($array);
        //Quay về danh sách
        return Redirect::route('admin/customer')->with('success', 'Edit a customer successfully!');
    }

    public function destroy(Customer $customer)
    {
        //Xóa bản ghi được chọn
        $customer->delete();
        //Quay về danh sách
        return Redirect::route('admin/customer')->with('success', 'Delete a customer successfully!');
    }

    //trang customer
    public function register()
    {
        return view('customers.register');
    }

    public function registerProcess(StoreCustomerRequest $request)
    {
        if ($request->validated()) {
            $array = [];
            $array = Arr::add($array, 'first_name', $request->first_name);
            $array = Arr::add($array, 'last_name', $request->last_name);
            $array = Arr::add($array, 'email', $request->email);
            $array = Arr::add($array, 'password', Hash::make($request->password));
            $array = Arr::add($array, 'phone_number', $request->phone_number);
            $array = Arr::add($array, 'address', $request->address);
            $array = Arr::add($array, 'status', 1);
            //Lấy dữ liệu từ form và lưu lên db
            Customer::create($array);

            return Redirect::route('customer.login');
        } else {
            //cho quay về trang login
            return Redirect::back();
        }
    }

    public function login()
    {
        return view('customers.login');
    }

    public function loginProcess(Request $request)
    {
        $account = $request->only(['email', 'password']);
        $check = Auth::guard('customer')->attempt($account);

        if ($check) {
            //Lấy thông tin của customer đang login
            $customer = Auth::guard('customer')->user();
            //Cho login
            Auth::guard('customer')->login($customer);
            //Ném thông tin customer đăng nhập lên session
            session(['customer' => $customer]);
            return Redirect::route('customer.profile');
        } else {
            //cho quay về trang login
            return Redirect::back();
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        session()->forget('customer');
        return view('customers.logoutConfirm');
    }

    public function forgotPassword()
    {
        return view('customers.login');
    }

    public function editProfile()
    {
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        return view('customers.profiles.profile', [
            'customer' => $customer
        ]);
    }

    public function updateProfile(UpdateCustomerRequest $request)
    {
        //Lấy dữ liệu trong form và update lên db
        $array = [];
        $array = Arr::add($array, 'first_name', $request->first_name);
        $array = Arr::add($array, 'last_name', $request->last_name);
        $array = Arr::add($array, 'email', $request->email);
        $array = Arr::add($array, 'phone_number', $request->phone_number);
        $array = Arr::add($array, 'address', $request->address);

        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $customer->update($array);
        //Quay về danh sách
        return Redirect::route('customer.profile');
    }

    public function showOrderHistory()
    {
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $orders = Order::where('customer_id', $id)->orderBy('status')->paginate(2);

        return view('customers.profiles.orderHistory', [
            'customer' => $customer,
            'orders' => $orders,
        ]);
    }

    public function orderDetail(Order $order)
    {
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $orderId = $order->id;
        $orderDetails = DB::table('orders_details')
            ->where('order_id', '=', $orderId)
            ->join('products', 'orders_details.product_id', '=', 'products.id')
            ->get();

        $orderAmount = 0;
        $orderItems = 0;
        foreach ($orderDetails as $detail) {
            $orderItems += $detail->sold_quantity;
            $orderAmount += $detail->sold_price * $detail->sold_quantity;
        }
        $orderTotal = $orderAmount + 10;

        return view('customers.profiles.orderDetail', [
            'order' => $order,
            'order_details' => $orderDetails,
            'order_item' => $orderItems,
            'order_amount' => $orderAmount,
            'order_total' => $orderTotal,
            'customer' => $customer,
        ]);
    }

    public function editPassword()
    {
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        return view('customers.profiles.changePassword', [
            'customer' => $customer
        ]);
    }

    public function updatePassword(UpdateCustomerRequest $request)
    {
        $newPwd = Hash::make($request->new_pwd);
        $newPwd2 = $request->new_pwd2;

        $array = [];
        $array = Arr::add($array, 'password', $newPwd);
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $customer->update($array);

        return Redirect::route('customer.pwdUpdate');
    }
}
