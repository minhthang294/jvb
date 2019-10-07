<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminController extends Controller
{
    /**
     * Open the form to add new user
     *
     * @return void
     */
    protected function addUser()
    {
        return view('admin.user_add');
    }
    /**
     * Store user in database
     *
     * @param Request $request
     * @return void
     */
    protected function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:100',
            'name' => 'required|max:100',
            'password' => 'required|min:5|confirmed',
            'role' => 'required',
            'status' => 'required',
        ]);
        if ($validatedData) {
            $user = new User;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;
            $user->status = $request->status;

            $user->save();
        }
        return redirect()->action('AdminController@adduser')->with('success', 'Data inserted Successfully');
    }

    protected function viewUsers()
    {
        $users = DB::table('users')->select('*');
        $users = $users->get();
        return view('admin.user_list', ['users' => $users]);
    }

    protected function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin/user_edit', ['user' => $user]);
    }

    protected function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->status = $request->status;

        $user->save();
        return redirect()->action('AdminController@viewUsers');
    }

    protected function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->action('AdminController@viewUsers')->with('success','Deleted succesfully');
    }
}
