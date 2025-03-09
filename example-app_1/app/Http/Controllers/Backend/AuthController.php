<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthRequest;

class AuthController extends Controller

{
    public function __construct(){

    }
    public function index(){
        if(Auth::id() != null){
            return redirect()->route('dashboard.index');
        }


        return view('backend.auth.login');
    }
    public function login(AuthRequest $request){
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard.index')->with('success', 'Dang nhap thanh cong');
        }
        return redirect()->route('auth.admin')->with('error', 'Email hoac mat khau khong dung');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
