<?php

namespace App\Http\Controllers;

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
        if ($user->role != 'admin') {
            session()->flash('message1', 'You Are Not Admin');
            return redirect('/');
        }
        session()->flash('message', 'Login Successfully');
        return redirect('/user');
    }
}
