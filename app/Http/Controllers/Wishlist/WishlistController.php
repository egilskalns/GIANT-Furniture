<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public $wishlistService;

    public function __construct(
        \App\Services\Wishlist\Service $wishlistService
    )
    {
        $this->wishlistService = $wishlistService;
    }
    public function index()
    {
        $wishlist = $this->wishlistService->getItems();

        $allCategories = Category::all();
        $mainCategories = $allCategories->whereNull('parent_id')->all();
        $subtotal = 0;
        $total = 0;

        foreach ($wishlist as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            $total += $item['price'] * (1-$item['attributes']['discount']) * $item['quantity'];
        }

        return view('wishlist.index', compact('wishlist', 'mainCategories', 'subtotal', 'total'));
    }

    /**
     * @throws InvalidItemException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->wishlistService->store($request);
        return back();
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->wishlistService->update($request);
        return back();
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->wishlistService->destroy($id);
        return back();
    }

    public function clearCart(): \Illuminate\Http\RedirectResponse
    {
        $this->wishlistService->clearCart();
        return back();
    }
}
