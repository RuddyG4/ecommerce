<?php

namespace App\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTable extends Component
{
    public $total = 0, $products, $qtys = [];
    public $aux_qty;

    public function render()
    {
        return view('livewire.cart-table');
    }

    public function mount()
    {
        $cart = Cart::content();
        $productIds = [];
        foreach ($cart as $item) {
            $productIds[] = $item->id;
            $this->qtys[$item->rowId] = $item->qty;
        }
        $this->total = Cart::subtotal();
        $products = Product::select('id', 'image_path')->whereIn('id', $productIds)->get();
        foreach ($products as $product) {
            $this->products[$product->id] = $product->image_path;
        }
    }

    public function increment($rowId, $qty)
    {
        Cart::update($rowId, $qty + 1);
        $this->qtys[$rowId] = $qty + 1;
        $this->total = Cart::subtotal();
        $this->dispatch('cartUpdated');
    }

    public function decrement($rowId, $qty)
    {
        if ($qty > 1) {
            Cart::update($rowId, $qty - 1);
            $this->qtys[$rowId] = $qty - 1;
            $this->total = Cart::subtotal();
            $this->dispatch('cartUpdated');
        }
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        unset($this->qtys[$rowId]);
        $this->total = Cart::subtotal();
        $this->dispatch('cartUpdated');
    }

    public function focusOutInput($rowId)
    {
        // If lose focus on the quantity input and its value is empty or less than 1, set the value to aux_qty
        if ($this->qtys[$rowId] == null || $this->qtys[$rowId] <= 0) {
            $this->qtys[$rowId] = $this->aux_qty;
        }
    }

    public function updatingQtys($newValue, $rowId)
    {
        // Save the old value of the quantity input in a variable (aux_qty)
        if ($this->qtys[$rowId] != null && $this->qtys[$rowId] > 0) {
            $this->aux_qty = $this->qtys[$rowId];
        }
    }

    public function updatedQtys($newValue, $rowId)
    {
        if ($this->qtys[$rowId] != null && $this->qtys[$rowId] > 0) {
            Cart::update($rowId, $this->qtys[$rowId]);
            $this->total = Cart::subtotal();
            $this->dispatch('productAddedToCart');
        }
    }
}
