<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function login(LoginRequest $request){
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect()->route('tasks.index');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
