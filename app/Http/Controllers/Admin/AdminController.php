<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $currentId = Auth::guard('admin')->id();
        $admin = Admin::find($currentId);
        $data = [
            'admin' => $admin
        ];
        return to_route('admin.product', $data);
    }

    public function login()
    {
        return view('admins.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        //check db
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            //Lấy thông tin của admin đang login
            $admin = Auth::guard('admin')->user();
            //Cho login
            Auth::guard('admin')->login($admin);
            //Ném thông tin user đăng nhập lên session
            session(['admin' => $admin]);
            return to_route('admin.products')->with('success', 'Sign in successfully!');
        }
        return to_route('admin.login')->with('failed', 'Wrong email or password!')->withInput($request->input());
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        session()->forget('admin');
        return to_route('admin.login')->with('success', 'You have been logged out successfully!');
    }

    public function index()
    {
        $admins = Admin::all();

        $data = [
            'admins' => $admins,
        ];

        return view('admins.admins.index', $data);
    }

    public function create()
    {
        return view('admins.admins.create');
    }

    public function store(StoreAdminRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $imagePath = "";
            if ($request->file('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
                if (!Storage::exists('public/admin/admins/' . $imagePath)) {
                    Storage::putFileAs('public/admin/admins/', $request->file('image'), $imagePath);
                }
            }

            $data = [];
            $data = Arr::add($data, 'first_name', $request->first_name);
            $data = Arr::add($data, 'last_name', $request->last_name);
            $data = Arr::add($data, 'email', $request->email);
            $data = Arr::add($data, 'password', Hash::make($request->password));
            $data = Arr::add($data, 'phone_number', $request->phone);
            $data = Arr::add($data, 'level', 1);
            $data = Arr::add($data, 'image', $imagePath);
            Admin::create($data);
            return to_route('admin.admins')->with('success', 'Admin created successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', [
            'admin' => $admin
        ]);
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $validated = $request->validated();

        if ($validated) {
            $imagePath = "";
            //Kiểm tra nếu đã chọn ảnh thì Lấy tên ảnh đang được chọn
            //không chọn ảnh thì sẽ lấy tên ảnh cũ trên db
            if ($request->file('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
            } else {
                $imagePath = $admin->image;
            }
            //Kiểm tra nếu file chưa tồn tại thì lưu vào trong folder code
            if (!Storage::exists('public/admin/admins/' . $imagePath)) {
                Storage::putFileAs('public/admin/admins/', $request->file('image'), $imagePath);
            }
            $data = [];
            $data = Arr::add($data, 'first_name', $request->first_name);
            $data = Arr::add($data, 'last_name', $request->last_name);
            $data = Arr::add($data, 'email', $request->email);
            //kiem tra neu password khong thay doi thi ko update password
            if ($request->password != $admin->password) {
                $data = Arr::add($data, 'password', Hash::make($request->password));
            }
            $data = Arr::add($data, 'phone_number', $request->phone);
            $data = Arr::add($data, 'level', $request->level);
            $data = Arr::add($data, 'image', $imagePath);
            $admin->update($data);

////           update xong -> logout admin
//            Auth::guard('admin')->logout();
//            session()->forget('admin');

            return to_route('admin.admins')->with('success', 'Admin updated successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $admin = Admin::find($id);
        //Xóa bản ghi được chọn
        $admin->delete();
        //Quay về danh sách
        return to_route('admin.admins')->with('success', 'Admin deleted successfully!');
    }

    // PDF

    public function downloadPDF()
    {
        $admins = Admin::all();

        $pdf = PDF::loadView('admin.admins.pdf', array('admins' => $admins))
            ->setPaper('a4', 'portrait');

        return $pdf->stream();
//        return $pdf->download('data.pdf');
    }
}
