<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarOrderController extends Controller
{
    public function index(){
        $userName = Auth::user()->name; 
        
        // Fetch bookings where the booking name matches the authenticated user's name
        $bookings = DB::table('bookings')
                    ->where('bookings.nama', $userName)
                    ->select('bookings.*')
                    ->get(); 

        return view('daftar_order', compact('bookings'));
    }
}