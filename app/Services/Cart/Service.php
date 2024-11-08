<?php

namespace App\Services\Cart;

use Darryldecode\Cart\Exceptions\InvalidItemException;

class Service
{
    protected $cart;

    public function __construct()
    {
        $this->cart = \Cart::session(1);
    }

    /**
     * @throws InvalidItemException
     */
    public function store($request): void
    {
        $this->cart->add([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity') ?? 1,
            'attributes' => $request->input('attributes'),
        ]);
    }

    public function update($request): void
    {
        $this->cart->update($request->input('id'), [
            'quantity' => $request->input('quantity'),
        ]);
    }

    public function destroy($id): void
    {
        $this->cart->remove($id);
    }

    public function clearCart(): void
    {
        $this->cart->clear();
    }

    public function getTotal(): float
    {
        return $this->cart->getTotal();
    }

    public function getItems(): array
    {
        return $this->cart->getContent()->toArray();
    }

    public function getItemCount(): int
    {
        return $this->cart->getContent()->count();
    }
}