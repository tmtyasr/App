<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /// This method will show dashboard page for admin
    public function index(){
        $totalUsers = User::where('role', 'customer')->count();
        $totalBookings = Booking::count();
        $pendingInquiries = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();
        $recentBookings = Booking::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();


    return view('admin.dashboard', compact('totalUsers', 'totalBookings', 'pendingInquiries', 'confirmedBookings','cancelledBookings', 'recentBookings'));
    }
}
