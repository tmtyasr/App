<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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

    return view('admin.booking', compact('bookings'));
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


    public function showBookingForm(Request $request)
    {
        // Retrieve data from the URL parameters
        $event = $request->query('event');
        $price = $request->input('price');
        $paket = $request->input('paket');

        // Pass the data to the booking form view
        return view('booking', compact('event', 'price', 'paket'));
    }

    public function confirmBooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'confirmed';
        $booking->save();

        return redirect()->back()->with('success', 'Booking confirmed successfully!');
    }


    public function cancelBooking($id)
{
    $booking = Booking::find($id);
    if ($booking && $booking->status == 'pending') {
        $booking->status = 'cancelled';
        $booking->save();
        return redirect()->back()->with('success', 'Booking telah dibatalkan.');
    }
    return redirect()->back()->with('error', 'Booking tidak dapat dibatalkan.');
}

public function status($status = null)
    {
        $query = Booking::with('user');

        if ($status) {
            $query->where('status', $status);
        }

        $bookings = $query->get();

        return view('admin.booking', compact('bookings'));
    }

    public function uncancelBooking($id)
{
    $booking = Booking::find($id);
    if ($booking && $booking->status == 'cancelled') {
        $booking->status = 'pending'; 
        $booking->save();
        return redirect()->back()->with('success', 'Booking cancellation reverted successfully!');
    }
    return redirect()->back()->with('error', 'Booking cancellation revert failed.');
}

}