<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index($category) {
        $allCategories = Category::all();

        $category = $allCategories->where('slug', $category)->first();
        $mainCategories = $allCategories->whereNull('parent_id')->all();
        $products = $category->products;

        if ($category->parent_id == null) {
            $subCategories = $category->children;
        } else {
            $subCategories = null;
        }

        return view('shop.index', compact('products', 'category', 'subCategories', 'mainCategories'));
    }

    public function show($category, $product) {
        var_dump('ir');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($product)
    {
        //
    }

    public function update(Request $request, $product)
    {
        //
    }

    public function destroy($product)
    {
        //
    }
}
