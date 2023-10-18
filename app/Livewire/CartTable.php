<?php

namespace App\Livewire;

use App\Models\Inventory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTable extends Component
{
    public $total = 0;
    
    public function render()
    {
        $cart = Cart::content();
        foreach($cart as $item){
            $this->total += $item->price * $item->qty;
        }
        return view('livewire.cart-table', compact('cart'));
    }

    public function increment($inventory_item_id)
    {
        $inventory_item = Inventory::with('product')->find($inventory_item_id);
        Cart::add(
            $inventory_item->id, 
            $inventory_item->product->product_name, 
            1, 
            $inventory_item->sale_price
        );
    }

    public function decrement($inventory_item_id)
    {
        $inventory_item = Inventory::with('product')->find($inventory_item_id);
        Cart::add(
            $inventory_item->id, 
            $inventory_item->product->product_name, 
            -1, 
            $inventory_item->sale_price
        );
    }

    public function remove($inventory_item_id)
    {
        foreach(Cart::content() as $item){
            if($item->id == $inventory_item_id){
                Cart::remove($item->rowId);
            }
        }
    }
}
