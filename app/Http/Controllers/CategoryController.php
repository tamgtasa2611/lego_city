<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->select(DB::raw('categories.*, count(category_id) as category_quantity'))
            ->groupBy('id', 'name', 'image')
            ->get();
        return view('customers.category', [
            'categories' => $categories,
        ]);
    }
}
