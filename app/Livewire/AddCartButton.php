<?php

namespace App\Livewire;

use App\Models\Inventory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddCartButton extends Component
{
    public $cart_count = 0, $product_id, $product_name, $sale_price;

    public function render()
    {
        return view('livewire.add-cart-button');
    }

    public function mount($inventory_item_id) {
        $inventory_item = Inventory::with('product')->find($inventory_item_id);
        $this->product_id = $inventory_item->product_id;
        $this->product_name = $inventory_item->product->product_name;
        $this->sale_price = $inventory_item->sale_price;
        foreach (Cart::content() as $item) {
            if ($item->id == $this->product_id) {
                $this->cart_count = $item->qty;
            }
        }
    }

    public function addToCart()
    {
        $item = Cart::add(
            $this->product_id,
            $this->product_name, 
            1, 
            $this->sale_price
        );
        $this->cart_count = $item->qty;
        $this->dispatch('cartUpdated');
    }
}
