<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function index(Request $request, $category) {
        $allCategories = Category::all();

        $category = $allCategories->where('slug', $category)->first();
        $mainCategories = $allCategories->whereNull('parent_id')->all();

        if ($category->children->count() > 0) {
            $categoryIds = $category->children->pluck('id')->toArray();
            $products = $this->model
                ->filter($request->all())
                ->whereIn('category_id', $categoryIds);
        } else {
            $products = $this->model
                ->filter($request->all())
                ->where('category_id', $category->id);
        }

        $minMaxDimensions = Product::getMaxMinDimensions($category);
        $productsCount = $products->get()->count();
        $minMaxPrice = Product::getMaxMinPrice($category);

        $paginatedProducts = $products->paginate(24);

        if ($category->parent_id == null) {
            $subCategories = $category->children;
        } else {
            $subCategories = null;
        }

        return view('shop.index', compact('paginatedProducts', 'productsCount', 'minMaxPrice', 'minMaxDimensions', 'category', 'subCategories', 'mainCategories'));
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
