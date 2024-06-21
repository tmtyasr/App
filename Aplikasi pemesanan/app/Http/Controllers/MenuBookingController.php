<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuBookingController extends Controller
{
    // This method will show menu booking page for customer
    public function index(){
        $menus = Menu::orderBy('id', 'ASC')->get();
        return view('menu_booking',[
            'menus' => $menus
        ]);
    }

    public function showEvent($event)
    {
        // Ambil semua menu berdasarkan event name
        $menus = Menu::where('event', $event)->get();
        
        // Kembalikan view dengan data menu berdasarkan event name
        return view('menu_booking', ['menus' => $menus, 'event' => $event]);
    }
}
