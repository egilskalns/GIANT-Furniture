<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $items = $this->cartService->getItems();

        $allCategories = Category::all();
        $mainCategories = $allCategories->whereNull('parent_id')->all();
        $subtotal = 0;
        $total = 0;

        foreach ($items as $item) {
            $subtotal += $item['price'] * $item['quantity'];
            $total += $item['price'] * (1-$item['attributes']['discount']) * $item['quantity'];
        }

        return view('cart.index', compact('items', 'mainCategories', 'subtotal', 'total'));
    }

    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->cartService->addItem(
            $request->input('id'),
            $request->input('name'),
            $request->input('price'),
            $request->input('quantity', 1),
            $request->input('attributes', [])
        );

        return redirect()->back();
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        $this->cartService->updateItemQuantity($id, $quantity);

        return redirect()->back();
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->cartService->removeItem($id);
        return redirect()->back();
    }

    public function clearCart(): \Illuminate\Http\RedirectResponse
    {
        $this->cartService->clearCart();
        return redirect()->back();
    }
}
