<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    // GET ALL
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Maintenance::with('plant')->get()
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $data = $request->validate([
            'plant_id' => 'required|exists:plants,plant_id',
            'task_type' => 'required|in:watering,pruning,fertilization',
            'scheduled_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $maintenance = Maintenance::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Maintenance created',
            'data' => $maintenance
        ]);
    }

    // SHOW
    public function show($id)
    {
        $maintenance = Maintenance::with('plant')->find($id);

        if (!$maintenance) {
            return response()->json([
                'status' => false,
                'message' => 'Not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $maintenance
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $maintenance = Maintenance::find($id);

        if (!$maintenance) {
            return response()->json([
                'status' => false,
                'message' => 'Not found'
            ], 404);
        }

        $data = $request->validate([
            'plant_id' => 'sometimes|exists:plants,plant_id',
            'task_type' => 'sometimes|in:watering,pruning,fertilization',
            'scheduled_date' => 'sometimes|date',
            'status' => 'sometimes|in:pending,in_progress,completed'
        ]);

        $maintenance->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Updated',
            'data' => $maintenance
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);

        if (!$maintenance) {
            return response()->json([
                'status' => false,
                'message' => 'Not found'
            ], 404);
        }

        $maintenance->delete();

        return response()->json([
            'status' => true,
            'message' => 'Deleted'
        ]);
    }
}