<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // This method will show gallery page for customer
    public function index(){
        return view('Gallery');
    }
}
