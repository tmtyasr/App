<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //This method will show login page for customer
    public function index() {
        return view('login');
    }

    // This method will authenticate user
    public function authenticate(Request $request) {

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email,'password' =>$request->password])) {
                return redirect()->route('home');
            } else {
                return redirect()->route('account.login')->with('error','Either email or password is incorrect.
                ');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
}

    // This method will show register page
    public function register(){
        return view('register');
    }

    public function processRegister(Request $request) {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'phone' => 'required', 'unique:users', 'regex:/^[0-9]{10,15}$/',
            'password' => 'required|confirmed|min:5',
            'name' => 'required',
            'password_confirmation' => 'required',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();
            return redirect()->route('account.login')->with('success','You have successfully registered.');
        } else {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    }


    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
