<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventoryController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        $defaultBranch = Branch::with('products')->find(1);
        $products = Inventory::where('branch_id', $defaultBranch->id)->with('product')->get();
        $notIncludedProducts = Product::whereNotIn('id', $products->pluck('product_id'))->get();

        return Inertia::render('Inventory/Index', compact('branches', 'defaultBranch', 'products', 'notIncludedProducts'));
    }

    public function getProducts(int $branch_id)
    {
        $branch = Branch::find($branch_id);
        $products = Inventory::where('branch_id', $branch->id)->with('product')->get();
        $notIncludedProducts = Product::whereNotIn('id', $products->pluck('product_id'))->get();

        return response()->json([
            'defaultBranch' => $branch,
            'products' => $products,
            'notIncludedProducts' => $notIncludedProducts
        ]);
    }

    public function show($inventoryID)
    {
        $productInventory = Inventory::where('id', $inventoryID)->with('product')->first();
        return Inertia::render('Inventory/Show', compact('productInventory'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|integer',
            'branch_id' => 'required|integer',
            'stock' => 'required|integer',
            'sale_price' => 'required|numeric',
            'purchase_price' => 'required|numeric'
        ]);
        
        Inventory::create($data);

        return redirect()->route('inventory.index');
    }
}
