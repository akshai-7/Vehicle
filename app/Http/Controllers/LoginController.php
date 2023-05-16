<?php

namespace App\Http\Controllers;

use App\Mail\passwordRest;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function admin(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            session()->flash('message1', 'Email-id or Password is not matched');
            return redirect('/');
        }
        if ($user->role != 'Admin') {
            session()->flash('message1', 'You Are Not Admin');
            return redirect('/');
        }
        session()->flash('message', 'Login Successfully');
        return redirect('/dashboard');
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
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('message3', ' Your Password is Updated!');
        return view('/home');
    }
}
