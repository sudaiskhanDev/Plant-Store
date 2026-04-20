<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    // GET ALL
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Order::with('customer')->get()
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_date' => 'required',
            'total_amount' => 'required',
            'status' => 'required',
            'customer_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $order = Order::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Order created',
            'data' => $order
        ]);
    }

    // SHOW
    public function show($id)
    {
        return Order::with('customer')->find($id);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $order->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Updated',
            'data' => $order
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Deleted'
        ]);
    }
}