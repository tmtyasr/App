<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // This method will show dashboard page for customer
    public function index(){
        $categories = ['Graduation', 'Engagement', 'Prewedding', 'Wedding'];
        $menus = [];

        foreach ($categories as $category) {
            $menu = Menu::where('event', $category)->first();
            if ($menu) {
                $menus[] = $menu;
            }
        }

        return view('home', [
            'menus' => $menus
        ]);
    }

}
