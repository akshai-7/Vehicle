<?php

namespace App\Http\Controllers;

use App\Mail\passwordRest;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function admin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role == 'Admin') {
                session()->flash('message', 'Login Successfully');
                return redirect('/dashboard');
            }
            if (Auth::user()->role != 'Admin') {
                session()->flash('message1', 'You Are Not Admin');
                return redirect('/');
            }
        } else {
            session()->flash('message1', 'Email-id or Password is not matched');
            return redirect('/');
        }
    }

    public function passwordreset(Request $request)
    {
        Mail::To($request->email)->send(new passwordRest($request));
        session()->flash('message', ' We have emailed your password reset link!');
        return redirect('/password/reset');
    }

    public function passwordupdate(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            session()->flash('message1', 'Invalid Email');
            return redirect('/password/reset');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('message3', ' Your Password is Updated!');
        return view('/home');
    }
}
