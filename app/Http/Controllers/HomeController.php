<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'admin' ) {
            return view('home');
        }else{
            return redirect()->route('card.show',auth()->user()->id);
        }
    }

    public function profile()
    {
        return view('profile');
    }

    public function profile_update(Request $request)
    {
       
        $this->validate($request,[
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('message', 'Password Successfully Changed');
            } else {
                return redirect()->back()->with('message','New password cannot be the same as old password.');
            }
        } else {
            return redirect()->back()->with('error','Current password not match.');
        }
    }
}
