<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        return view('users', compact('users'));
    }

    public function showItemsInCart(User $user){

        $items = $user->cart->items;
        return view('cart', compact('items'));
    }
}
