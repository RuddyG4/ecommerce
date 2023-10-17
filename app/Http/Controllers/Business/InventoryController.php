<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InventoryController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        $defaultBranch = Branch::with('products')->find(1);
        $products = Inventory::where('branch_id', $defaultBranch->id)->with('product')->get();

        return Inertia::render('Inventory/Index', compact('branches', 'defaultBranch', 'products'));
    }

    public function getProducts(int $branch_id)
    {
        $branch = Branch::find($branch_id);
        $products = Inventory::where('branch_id', $branch->id)->with('product')->get();

        return response()->json([
            'defaultBranch' => $branch,
            'products' => $products,
        ]);
    }
}
