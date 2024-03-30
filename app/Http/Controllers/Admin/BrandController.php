<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Requests\BrandFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();

        $data = [
            'brands' => $brands,
        ];

        return view('admins.brands.index', $data);
    }

    public function create()
    {
        return view('admins.brands.create');
    }

    public function store(BrandFormRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'name', $request->name);

            Brand::create($data);
            return to_route('admin.brands')->with('success', 'Brand created successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function edit(Brand $brand)
    {
        return view('admins.brands.edit', [
            'brand' => $brand
        ]);
    }

    public function update(BrandFormRequest $request, Brand $brand)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'name', $request->name);

            $brand->update($data);
            return to_route('admin.brands')->with('success', 'Brand updated successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $brand = Brand::find($id);
        //Xóa bản ghi được chọn
        $brand->delete();
        //Quay về danh sách
        return to_route('admin.brands')->with('success', 'Brand deleted successfully!');
    }
}
