<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplierOrder;

class SupplierOrderController extends Controller
{
    // GET ALL
    public function index()
    {
        return response()->json(SupplierOrder::all());
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|integer',
            'plant_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'delivery_status' => 'required|string',
        ]);

        $order = SupplierOrder::create([
            'supplier_id' => $request->supplier_id,
            'plant_id' => $request->plant_id,
            'quantity' => $request->quantity,
            'delivery_status' => $request->delivery_status,
        ]);

        return response()->json([
            'message' => 'Supplier Order created successfully',
            'data' => $order
        ]);
    }

    // GET SINGLE
    public function show($id)
    {
        return SupplierOrder::findOrFail($id);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $order = SupplierOrder::findOrFail($id);

        $request->validate([
            'supplier_id' => 'required|integer',
            'plant_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'delivery_status' => 'required|string',
        ]);

        $order->update([
            'supplier_id' => $request->supplier_id,
            'plant_id' => $request->plant_id,
            'quantity' => $request->quantity,
            'delivery_status' => $request->delivery_status,
        ]);

        return response()->json([
            'message' => 'Supplier Order updated successfully',
            'data' => $order
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        SupplierOrder::destroy($id);

        return response()->json([
            'message' => 'Supplier Order deleted successfully'
        ]);
    }
}