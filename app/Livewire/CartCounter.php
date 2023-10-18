<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    public function render()
    {
        $cart_count = Cart::count();
        return view('livewire.cart-counter', compact('cart_count'));
    }
}
