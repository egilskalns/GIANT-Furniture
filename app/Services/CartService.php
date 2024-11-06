<?php

namespace App\Services;

use Darryldecode\Cart\Exceptions\InvalidItemException;

class CartService
{
    protected $cart;

    public function __construct()
    {
        $this->cart = \Cart::session(1);
    }

    /**
     * @throws InvalidItemException
     */
    public function addItem($id, $name, $price, $quantity = 1, $attributes = []): void
    {
        $this->cart->add([
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'attributes' => $attributes,
        ]);
    }

    public function updateItemQuantity($id, $quantity): void
    {
        $this->cart->update($id, [
            'quantity' => $quantity,
        ]);
    }

    public function removeItem($id): void
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