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
        $products = $category->products();
        $productsCount = $products->get()->count();
        $minPrice = $products->get()->min('price');
        $maxPrice = $products->get()->max('price');
        $paginatedProducts = $products->paginate(24);

        if ($category->parent_id == null) {
            $subCategories = $category->children;
        } else {
            $subCategories = null;
        }

        return view('shop.index', compact('paginatedProducts', 'productsCount', 'minPrice', 'maxPrice', 'category', 'subCategories', 'mainCategories'));
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
