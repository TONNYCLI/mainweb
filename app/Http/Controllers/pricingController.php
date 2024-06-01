<?php

namespace App\Http\Controllers;

use App\Models\pricing;
use Illuminate\Http\Request;

class pricingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pricing');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pricingCategory_id' => 'required|exists:pricing_categories,id',
            'details' => 'required|string|max:255',
            'amount' => 'required|integer',
        ]);

        Pricing::create($request->all());

        return back()->with('success', 'Pricing created successfully.');
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
