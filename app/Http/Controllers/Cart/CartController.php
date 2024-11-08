<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public $cartService;

    public function __construct(
        \App\Services\Cart\Service $cartService,
    )
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartItems = $this->cartService->getItems();

        $allCategories = Category::all();
        $mainCategories = $allCategories->whereNull('parent_id')->all();
        $subtotal = 0;
        $total = 0;

        foreach ($cartItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            $total += $item['price'] * (1-$item['attributes']['discount']) * $item['quantity'];
        }

        return view('cart.index', compact('cartItems', 'mainCategories', 'subtotal', 'total'));
    }

    /**
     * @throws InvalidItemException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->cartService->store($request);
        return back();
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->cartService->update($request);
        return back();
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->cartService->destroy($id);
        return back();
    }

    public function clearCart(): \Illuminate\Http\RedirectResponse
    {
        $this->cartService->clearCart();
        return back();
    }
}
