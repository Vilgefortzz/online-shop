<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request){

        /*
         * Validate e-mail correctness
         */
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:subscribers'
        ]);

        // Put new e-mail into a subscribe list

        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->save();

        session()->flash('subscribed', 'You subscribed to our newsletter');

        return back();
    }
}
