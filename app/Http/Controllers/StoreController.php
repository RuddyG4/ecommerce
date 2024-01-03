<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $inventory = Inventory::with('product')->where('branch_id', 1)->where('stock', '>', 0)->take(8)->get();
        return view('store.index', compact('inventory'));
    }

    public function cart()
    {
        return view('store.cart');
    }

    public function checkout()
    {
        return view('store.checkout');
    }
}
