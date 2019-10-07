<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($arr)) {
            if (Auth::user()->role == 1) {
                return view('admin.index');
            }
        } else {
            return view('welcome');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}
