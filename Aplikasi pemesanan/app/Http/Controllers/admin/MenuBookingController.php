<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MenuBookingController extends Controller
{
    public function index(){
        $menus = Menu::orderBy('id','ASC')->get();
        return view('admin.menu_booking',[
            'menus' => $menus
        ]);
    }


    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $rules = [
            'event' => 'required|min:5',
            'paket' => 'required',
            'facility' => 'required',
            'price' => 'required|numeric'
        ];

        if($request->image != "" ){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('admin.create')->withInput()->withErrors($validator);
        }

        // here we will insert product in db
        $menu = new Menu;
        $menu->event = $request->event;
        $menu->paket = $request->paket;
        $menu->facility = $request->facility;
        $menu->price = $request->price;
        $menu->save();

        if ($request->image != "") {
            // here we will store image
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time().'.'.$ext; // Unique image name

        // save image to admin directory
        $image->move(public_path('img/menu'),$imageName);

        // save image name in database
        $menu->image = $imageName;
        $menu->save();
        }

        return redirect()->route('admin.menu_booking')->with('success','Menu added succesfully');
    }
    
    public function edit($id){
        $menu = Menu::findOrFail($id);
        return view('admin.edit',[
            'menu' => $menu
        ]);
    }
    
    public function update($id, Request $request){
        $menu = Menu::findOrFail($id);

        $rules = [
            'event' => 'required|min:5',
            'paket' => 'required',
            'facility' => 'required',
            'price' => 'required|numeric'
        ];

        if($request->image != "" ){
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect()->route('admin.edit',$menu->id)->withInput()->withErrors($validator);
        }

        // here we will update menu
        $menu->event = $request->event;
        $menu->paket = $request->paket;
        $menu->facility = $request->facility;
        $menu->price = $request->price;
        $menu->save();

        if ($request->image != "") {
            // delete old image

            File::delete(public_path('img/menu/'.$menu->image)); 

            // here we will store image
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time().'.'.$ext; // Unique image name

        // save image to admin directory
        $image->move(public_path('img/menu'),$imageName);

        // save image name in database
        $menu->image = $imageName;
        $menu->save();
        }

        return redirect()->route('admin.menu_booking')->with('success','Menu updated succesfully');
    }
    
    public function destroy($id){
        $menu = Menu::findOrFail($id);

        // delete image
        File::delete(public_path('img/menu/'.$menu->image)); 

        // delete menu from database
        $menu->delete();

        return redirect()->route('admin.menu_booking')->with('success','Menu deleted succesfully');
    }
    
}
