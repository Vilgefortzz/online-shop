<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class UserController extends Controller
{

    public function showSettings(User $user){

        return view('users.settings', compact('user'));
    }

    public function showPersonalData(User $user){

        return view('users.personal_data', compact('user'));
    }

    public function showOrders(User $user){

        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(2);

        return view('users.orders', compact('orders'));
    }

    public function showPendingOrders(User $user){

        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->orderBy('created_at', 'desc')->paginate(2);

        return view('users.orders', compact('orders'));
    }

    public function showPreparingToSendOrders(User $user){

        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Preparing to send')
            ->orderBy('created_at', 'desc')->paginate(2);

        return view('users.orders', compact('orders'));
    }

    public function showWaitingForPaymentOrders(User $user){

        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Waiting for payment')
            ->orderBy('created_at', 'desc')->paginate(2);

        return view('users.orders', compact('orders'));
    }

    public function showSendOrders(User $user){

        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Send')
            ->orderBy('created_at', 'desc')->paginate(2);

        return view('users.orders', compact('orders'));
    }

    public function showCompletedOrders(User $user){

        $orders = Order::where('user_id', $user->id)
            ->where('status', 'Completed')
            ->orderBy('created_at', 'desc')->paginate(2);

        return view('users.orders', compact('orders'));
    }

    /**
     * Ajax request
     */
    public function getPersonalData(User $user){

        return response()->json($user);
    }

    public function updateUsername(User $user, Request $request){

        /*
         * Validate username correctness
         */
        $this->validate($request, [
            'username' => 'required|min:5|max:30',
        ]);

        $user->username = $request->username;
        $user->save();

        session()->flash('changed_username', 'You have successfully changed your username');

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

        session()->flash('changed_password', 'You have successfully changed your password');

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

        session()->flash('changed_email', 'You have successfully changed your e-mail address');

        return back();
    }

    public function updatePersonalData(User $user, Request $request){

        /*
         * Validate data
         */
        $this->validate($request, [
            'first_name' => 'required|min:3|max:30',
            'last_name' => 'required|min:5|max:50',
            'street' => 'required|min:5|max:50',
            'postal_code' => 'required|min:5|max:20',
            'city' => 'required|min:5|max:15',
            'phone_number' => 'required'
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->street = $request->street;
        $user->postal_code = $request->postal_code;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->phone_number = $request->phone_number;
        $user->save();

        session()->flash('changed_personal_data', 'You have successfully changed your personal data');

        return back();
    }

    public function delete(User $user){

        /*
         * Very important - logout before delete and remove items from session
         */
        Auth::logout();
        Session::flush();

        $user->delete();

        session()->flash('removed_account', 'Your account was permanently removed from our database');

        return redirect()->to('/');
    }
}
