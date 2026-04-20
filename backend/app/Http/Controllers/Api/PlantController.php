<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Validator;

class PlantController extends Controller
{
    // GET ALL
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Plant::with('category')->get()
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'description' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $plant = Plant::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Plant created',
            'data' => $plant
        ]);
    }

    // SHOW
    public function show($id)
    {
        return Plant::with('category')->find($id);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $plant = Plant::find($id);

        if (!$plant) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $plant->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Updated',
            'data' => $plant
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Plant::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Deleted'
        ]);
    }
}