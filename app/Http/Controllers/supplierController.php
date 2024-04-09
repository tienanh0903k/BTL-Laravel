<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = supplier::paginate(10);
        return view('admin.suppiler.index', compact('suppliers'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $suppliers = Supplier::where('name', 'like', '%' . $query . '%')
                         ->orWhere('email', 'like', '%' . $query . '%')
                         ->orWhere('address', 'like', '%' . $query . '%')
                         ->paginate(10);
        return view('admin.suppiler.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.suppiler.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(supplier $supplier)
    {
        //
    }
}
