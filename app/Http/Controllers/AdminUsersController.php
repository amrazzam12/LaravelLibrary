<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index' , [
            'users' => $users
        ]);
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|max:10|unique:users',
           'password' => 'required|min:6',
           'email' => 'required|email'
       ]);

       $user = new User;
       $user->name = $request->input('name');
       $user->password = bcrypt($request->input('password'));
       $user->email = $request->input('email');

       $user->save();



        return redirect()->action('AdminUsersController@index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.users.edit' , [
            "user" => User::find($id)
        ]);
    }

    public function update(Request $request , $id)
    {

        $request->validate([
            'name'=> [
                'required' ,
                Rule::unique('users')->ignore($id)
            ],
            'email' => 'required|email'
        ]);


        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->action('AdminUsersController@index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return \redirect()->back();
    }
}
