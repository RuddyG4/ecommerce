<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('productType')->paginate();
        return Inertia::render('Products/Index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $product_types = ProductType::all();
        $vendors = Vendor::all();
        $categories = Category::all();
        return Inertia::render('Products/Create', compact('brands', 'product_types', 'vendors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:40',
            'product_description' => 'required|string|max:150',
            'state' => 'required|boolean',
            'weight' => 'required|numeric|max:999.99|min:0.01|decimal:0,2',
            'brand_id' => 'required|integer',
            'product_type_id' => 'required|integer',
            'vendor_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        if (request()->hasFile('product_image')) {
            // $data['product_image'] = request()->file('product_image')->store('products');
        }

        $data['description'] = $data['product_description'];
        unset($data['product_description']);

        Product::create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
