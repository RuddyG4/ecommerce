<?php

namespace App\Livewire;

use App\Models\Inventory;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddCartButton extends Component
{
    public $inventory_item_id;

    public function render()
    {
        return view('livewire.add-cart-button');
    }

    public function addToCart()
    {
        $inventory_item = Inventory::with('product')->find($this->inventory_item_id);
        Cart::add(
            $inventory_item->id,
            $inventory_item->product->product_name, 
            1, 
            $inventory_item->sale_price
        );
    }
}
