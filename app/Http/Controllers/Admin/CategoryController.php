<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories,
        ];

        return view('admins.categories.index', $data);
    }

    public function create()
    {
        return view('admins.categories.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $imagePath = "";
            if ($request->file('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
                if (!Storage::exists('public/admin/categories/' . $imagePath)) {
                    Storage::putFileAs('public/admin/categories/', $request->file('image'), $imagePath);
                }
            }

            $data = [];
            $data = Arr::add($data, 'name', $request->name);
            $data = Arr::add($data, 'image', $imagePath);

            Category::create($data);
            return to_route('admin.categories')->with('success', 'Category created successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function edit(Category $category)
    {
        return view('admins.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        $validated = $request->validated();
        if ($validated) {
            $imagePath = "";
            //Kiểm tra nếu đã chọn ảnh thì Lấy tên ảnh đang được chọn
            //không chọn ảnh thì sẽ lấy tên ảnh cũ trên db
            if ($request->file('image')) {
                $imagePath = $request->file('image')->getClientOriginalName();
            } else {
                $imagePath = $category->image;
            }
            //Kiểm tra nếu file chưa tồn tại thì lưu vào trong folder code
            if (!Storage::exists('public/admin/categories/' . $imagePath)) {
                Storage::putFileAs('public/admin/categories/', $request->file('image'), $imagePath);
            }

            $data = [];
            $data = Arr::add($data, 'name', $request->name);
            $data = Arr::add($data, 'image', $imagePath);

            $category->update($data);
            return to_route('admin.categories')->with('success', 'Category updated successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        //Xóa bản ghi được chọn
        $category->delete();
        //Quay về danh sách
        return to_route('admin.categories')->with('success', 'Category deleted successfully!');
    }
}
