<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
        
    }

    public function pay(Request $request)
    {

        $booking = Booking::find($request->booking_id);

        $params = [
            'transaction_details' => [
                'order_id' => $booking->id,
                'gross_amount' => $booking->price,
            ],
            'item_details' => [
                [
                    'id' => $booking->id,
                    'price' => $booking->price,
                    'quantity' => 1,
                    'name' => $booking->event,
                ],
            ],
            'customer_details' => [
                'first_name' => $booking->user->name,
                'email' => $booking->user->email,
                'phone' => $booking->nomor,
                'address' => $booking->alamat,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        // Mengembalikan Snap Token sebagai respons JSON
        return response()->json(['snapToken' => $snapToken]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('services.midtrans.serverKey');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key) {
            $booking = Booking::find($request->order_id);

            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $booking->status = 'confirmed';
            } elseif ($request->transaction_status == 'pending') {
                $booking->status = 'pending';
            } elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
                $booking->status = 'cancelled';
            }

            $booking->save();
        }

        return response()->json(['status' => 'success']);
    }
}
