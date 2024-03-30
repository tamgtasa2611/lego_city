<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Age;
use App\Requests\AgeFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class AgeController extends Controller
{
    public function index(Request $request)
    {
        $ages = Age::all();

        $data = [
            'ages' => $ages,
        ];

        return view('admins.ages.index', $data);
    }

    public function create()
    {
        return view('admins.ages.create');
    }

    public function store(AgeFormRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'name', $request->name);
            $data = Arr::add($data, 'description', $request->description);

            Age::create($data);
            return to_route('admin.ages')->with('success', 'Age created successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function edit(Age $age)
    {
        return view('admins.ages.edit', [
            'age' => $age
        ]);
    }

    public function update(AgeFormRequest $request, Age $age)
    {
        $validated = $request->validated();

        if ($validated) {
            $data = [];
            $data = Arr::add($data, 'name', $request->name);
            $data = Arr::add($data, 'description', $request->description);
            
            $age->update($data);
            return to_route('admin.ages')->with('success', 'Age updated successfully!');
        } else {
            return back()->with('failed', 'Something went wrong!');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $age = Age::find($id);
        //Xóa bản ghi được chọn
        $age->delete();
        //Quay về danh sách
        return to_route('admin.ages')->with('success', 'Age deleted successfully!');
    }
}
