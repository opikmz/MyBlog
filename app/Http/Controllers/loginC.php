<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginC extends Controller
{
    public function login(){
        return view('backend.pages.login');
    }

    public function act_login(Request $request){
        // dd($request->all());
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if(Auth::User()->role === 'admin')
            {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}