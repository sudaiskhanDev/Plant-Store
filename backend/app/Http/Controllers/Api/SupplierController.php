<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    // GET ALL
    public function index()
    {
        return response()->json(Supplier::all());
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            // PHONE VALIDATION (10-15 digits only)
            'contact' => [
                'required',
                'regex:/^[0-9]{10,15}$/'
            ],

            'address' => 'required|string',
        ]);

        $supplier = Supplier::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);

        return response()->json([
            'message' => 'Supplier created successfully',
            'data' => $supplier
        ]);
    }

    // GET SINGLE
    public function show($id)
    {
        return Supplier::findOrFail($id);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',

            // PHONE VALIDATION (same rule)
            'contact' => [
                'required',
                'regex:/^[0-9]{10,15}$/'
            ],

            'address' => 'required|string',
        ]);

        $supplier->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
        ]);

        return response()->json([
            'message' => 'Supplier updated successfully',
            'data' => $supplier
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Supplier::destroy($id);

        return response()->json([
            'message' => 'Supplier deleted successfully'
        ]);
    }
}