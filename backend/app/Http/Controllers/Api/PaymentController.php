<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        return response()->json(Payment::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string',
            'payment_status' => 'required|string',
        ]);

        $payment = Payment::create([
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
        ]);

        return response()->json($payment);
    }

    public function show($id)
    {
        return Payment::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $payment->update([
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
        ]);

        return response()->json($payment);
    }

    public function destroy($id)
    {
        Payment::destroy($id);

        return response()->json(['message' => 'Payment deleted']);
    }
}