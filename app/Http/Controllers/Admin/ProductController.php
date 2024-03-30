<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Age;
use App\Requests\StoreProductRequest;
use App\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $data = [
            'products' => $products,
        ];
        return view('admins.products.index', $data);
    }

    public function show()
    {
        $products = Product::with('brand')->paginate(6);
        return view("admins.product_manager.index", [
            "products" => $products
        ]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $ages = Age::all();

        $data = [
            'brands' => $brands,
            'categories' => $categories,
            'ages' => $ages,
        ];
        return view('admins.products.create', $data);
    }

    public function store(StoreProductRequest $request)
    {
        if ($request->validated()) {
            $imagePath = "";
            if ($request->file('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
                if (!Storage::exists('public/admin/products/' . $imagePath)) {
                    Storage::putFileAs('public/admin/products/', $request->file('image'), $imagePath);
                }
            }

            $data = [
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imagePath,
                'category_id' => $request->category_id,
                'age_id' => $request->age_id,
                'brand_id' => $request->brand_id
            ];

            Product::create($data);
            return redirect(route('admin.products'));
        }
        return back()->with('failed', 'Something went wrong...');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $ages = Age::all();

        $data = [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
            'ages' => $ages,
        ];
        return view('admins.products.edit', $data);
    }


    public function update(Product $product, Request $request)
    {
        $imagePath = "";
        //Kiểm tra nếu đã chọn ảnh thì Lấy tên ảnh đang được chọn
        //không chọn ảnh thì sẽ lấy tên ảnh cũ trên db
        if ($request->file('image')) {
            $imagePath = $request->file('image')->getClientOriginalName();
        } else {
            $imagePath = $product->image;
        }
        if ($request->file('image')) {
            $imagePath = $request->file('image')->getClientOriginalName();
            if (!Storage::exists('public/admin/products/' . $imagePath)) {
                Storage::putFileAs('public/admin/products/', $request->file('image'), $imagePath);
            }
        }

        $data = [
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'age_id' => $request->age_id,
            'brand_id' => $request->brand_id
        ];

        $product->update($data);
        return redirect(route('admin.products'));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        //Xóa bản ghi được chọn
        $product->delete();
        //Quay về danh sách
        return to_route('admin.products')->with('success', 'Product deleted successfully!');
    }
}
