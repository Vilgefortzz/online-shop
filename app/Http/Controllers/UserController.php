<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        return view('users', compact('users'));
    }

    public function showSettings(User $user){

        return view('users.settings', compact('user'));

    }

    public function updateName(User $user, Request $request){

        /*
         * Validate name correctness
         */
        $this->validate($request, [
            'name' => 'required|min:5|max:30',
        ]);

        $user->name = $request->name;
        $user->save();

        session()->flash('changed_name', 'You have succesfully changed your name');

        return back();
    }

    public function updatePassword(User $user, Request $request){

        /*
         * Validate password correctness
         */
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);

        $user->password = bcrypt($request->password);
        $user->save();

        session()->flash('changed_password', 'You have succesfully changed your password');

        return back();
    }

    public function updateEmail(User $user, Request $request){

        /*
         * Validate e-mail correctness
         */
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
        ]);

        $user->email = $request->email;
        $user->save();

        session()->flash('changed_email', 'You have succesfully changed your e-mail address');

        return back();
    }

    public function delete(User $user){

        /*
         * Very important - logout before delete
         */
        Auth::logout();

        $user->delete();

        session()->flash('removed_account', 'Your account was permanently removed from our database');

        return redirect()->to('/');
    }
}
