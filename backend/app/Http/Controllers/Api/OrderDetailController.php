<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Validator;

class OrderDetailController extends Controller
{
    // GET ALL
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => OrderDetail::with(['order','plant'])->get()
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'plant_id' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $detail = OrderDetail::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Order detail created',
            'data' => $detail
        ]);
    }

    // SHOW
    public function show($id)
    {
        return OrderDetail::with(['order','plant'])->find($id);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $detail = OrderDetail::find($id);

        if (!$detail) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $detail->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Updated',
            'data' => $detail
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        OrderDetail::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Deleted'
        ]);
    }
}