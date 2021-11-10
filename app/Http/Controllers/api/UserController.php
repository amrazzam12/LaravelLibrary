<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }
    public function show(User $user){
        return $user;
    }
    public function store(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return $user;
    }

    public function update(Request $request , User $user){
        $user->name =  $request->name;
        $user->email =  $request->email;
        $user->save();

        return $user;
    }

    public function destroy(User $user){
        $user->delete();
        return User::all();
    }
}
