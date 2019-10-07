<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function editprofile($id)
    {
        $user = User::find($id);
        return view('admin.editprofile', ['user' => $user]);
    }

    public function updateprofile(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->status = $request->status;
        $user->save();
        return redirect()->action('AdminController@viewUsers')->with('updateprofile', 'Your profile updated successfully!');
    }
    public function changepassword($id)
    {
        $user = User::find($id);
        return view('admin.changepass', ['user' => $user]);
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::find(Auth::id());
        $hashedPassword = $user->password;

        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Your password has been changed.');

            return back();
        }

        $request->session()->flash('failure', 'Your password has not been changed.');

        return back();
    }
}
