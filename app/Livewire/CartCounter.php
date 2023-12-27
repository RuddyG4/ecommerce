<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{
    public $cart_count;
    public function render()
    {
        return view('livewire.cart-counter');
    }

    public function mount()
    {
        $this->cart_count = Cart::count();
    }

    #[On('productAddedToCart')]
    public function updatedCartCount()
    {
        $this->cart_count = Cart::count();
    }
}
