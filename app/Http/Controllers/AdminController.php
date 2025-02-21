<?php

namespace App\Http\Controllers;

use App\Categories;
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
            return redirect()->action('AdminController@addUser')->with('success', 'Data inserted Successfully');
        }
    }

    protected function viewUsers()
    {
        $users = DB::table('users')->select(['*'])->whereNull('deleted_at')->get();
        return view('admin.user_list', ['users' => $users]);
    }

    protected function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin/user_edit', ['user' => $user]);
    }

    protected function updateUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:100',
            'name' => 'required|max:100',
            'role' => 'required',
            'status' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->status = $request->status;

        $user->save();
        return redirect()->action('AdminController@viewUsers')->with('success', 'Update successfully!');
    }

    protected function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->action('AdminController@viewUsers')->with('success','Deleted successfully!');
    }

    protected function deleteCategory($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect()->action('UserController@listCategory');
    }

    protected function editCategory($id)
    {
        $category = Categories::find($id);
        return view('admin\category_edit',['category'=>$category]);
    }

    protected function updateCategory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'index' =>'required',
        ]);

        $category = Categories::find($id);
        $category->name = $request->name;
        $category->index = $request->index;
        $category->save();
        return redirect()->action('UserController@listCategory')->with('successupdate', 'Update successfully!');
    }
}
