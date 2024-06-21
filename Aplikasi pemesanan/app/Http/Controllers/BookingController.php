<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        // Retrieve all bookings along with the associated user names
        $bookings = Booking::with('user')->get();

        return view('booking', compact('bookings'));
    }

    public function order()
    {
        // Ambil nama pengguna yang terautentikasi
        $userName = Auth::user()->name;

        // Cek apakah pengguna memiliki peran 'customer'
        if (Auth::user()->role === 'customer') {
            // Jika peran pengguna adalah 'customer', ambil daftar booking yang terkait dengan nama pengguna saat ini
            $bookings = Booking::where('nama', $userName)->get();
        } else {
            // Jika peran pengguna bukan 'customer', ambil semua daftar booking
            $bookings = Booking::all();
        }

        return view('daftar_order', compact('bookings'));
    }


    public function showBookingForm(Request $request)
{
    // Retrieve data from the URL parameters
    $event = $request->query('event');
    $price = $request->input('price');
    $paket = $request->input('paket');

    // Pass the data to the booking form view
    return view('booking', compact('event', 'price', 'paket'));
}

public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'event' => 'required|string|max:255',
            'paket' => 'required|string|max:255',
            'price' => 'required|numeric',
            'waktu' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // If validation fails, redirect back with error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Ambil nama pengguna yang terautentikasi
        $userName = Auth::user()->name;

        $booking = new Booking();
        $booking->nama = $userName;
        $booking->date = $request->date;
        $booking->event = $request->event;
        $booking->paket = $request->paket;
        $booking->price = $request->price;
        $booking->waktu = $request->waktu;
        $booking->nomor = $request->nomor;
        $booking->alamat = $request->alamat;
        $booking->status = 'pending';
        $booking->save();

        return redirect()->route('account.daftar_order')->with('success', 'Booking has been successfully completed!');
    }

    public function confirmBooking($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->status = 'confirmed';
            $booking->save();

            return redirect()->back()->with('success', 'Booking confirmed successfully!');
        }

        return redirect()->back()->with('error', 'Booking not found!');
    }

    public function cancel($id)
    {
        // Cari booking berdasarkan ID
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking tidak ditemukan.');
        }

        // Ubah status booking menjadi 'cancelled'
        $booking->status = 'cancelled';
        $booking->save();

        // Redirect ke halaman daftar order dengan pesan sukses
        return redirect()->route('account.daftar_order')->with('success', 'Booking berhasil dibatalkan.');
    }

    public function uncancel($id)
{
    $booking = Booking::find($id);
    if ($booking && $booking->status == 'cancelled') {
        $booking->status = 'pending'; // Mengembalikan status menjadi 'pending'
        $booking->save();
        return redirect()->back()->with('success', 'Booking telah diuncancel.');
    }
    return redirect()->back()->with('error', 'Booking tidak dapat diuncancel.');
}

   // Metode untuk menangani suksesnya pembayaran
   public function paymentSuccess(Request $request)
   {
       $bookingId = $request->input('booking_id');
       $booking = Booking::find($bookingId);
       if ($booking) {
           $booking->status = 'confirmed';
           $booking->save();
       }

       return response()->json(['status' => 'success']);
   }

   // Metode untuk halaman terima kasih
   public function thankYou()
   {
       return view('thank_you');
   }
}
