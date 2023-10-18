<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $inventory = Inventory::with('product')->where('branch_id', 1)->get();
        return view('store.index', compact('inventory'));
    }

    public function cart()
    {
        return view('store.cart');
    }
}
