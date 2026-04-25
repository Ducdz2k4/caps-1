<?php

namespace App\Http\Controllers;

use App\Registration;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show($id)
{
    $registration = \App\Registration::findOrFail($id);

    return view('payment.payment', compact('registration'));
}
    public function confirm(Request $request, $id)
{
    $registration = \App\Registration::findOrFail($id);

    //  nếu đã paid thì không xử lý nữa
    if ($registration->payment_status == 'paid') {
        return response()->json([
            'message' => 'Đã thanh toán rồi'
        ]);
    }

    $registration->payment_status = 'paid';
    $registration->save();

    return response()->json([
        'success' => true
    ]);
}
}