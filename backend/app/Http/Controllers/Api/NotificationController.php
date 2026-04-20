<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        return response()->json(Notification::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'message' => 'required|string',
            'type' => 'required|in:stock,maintenance,order',
            'date' => 'required|date',
        ]);

        $notification = Notification::create($request->all());

        return response()->json([
            'message' => 'Notification created successfully',
            'data' => $notification
        ]);
    }

    public function show($id)
    {
        return Notification::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $request->validate([
            'user_id' => 'required|integer',
            'message' => 'required|string',
            'type' => 'required|in:stock,maintenance,order',
            'date' => 'required|date',
        ]);

        $notification->update($request->all());

        return response()->json([
            'message' => 'Notification updated successfully',
            'data' => $notification
        ]);
    }

    public function destroy($id)
    {
        Notification::destroy($id);

        return response()->json([
            'message' => 'Notification deleted successfully'
        ]);
    }
}