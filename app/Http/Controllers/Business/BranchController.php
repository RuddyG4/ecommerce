<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::with('city')->get();
        return Inertia::render('Branches/Index', compact('branches')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return Inertia::render('Branches/Create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'branch_name' => 'required|string|max:40',
            'address' => 'required|string|max:140',
            'city_id' => 'required|integer',
        ]);

        Branch::create($data);

        return redirect()->route('branches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        $cities = City::all();
        return Inertia::render('Branches/Show', compact('cities', 'branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cities = City::all();
        return Inertia::render('Branches/Show', compact('cities', 'branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $data = $request->validate([
            'branch_name' => 'required|string|max:40',
            'address' => 'required|string|max:140',
            'city_id' => 'required|integer',
        ]);

        $branch->update($data);

        return redirect()->route('branches.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
