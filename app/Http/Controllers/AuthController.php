<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return Redirect()->route('user.index');
    }
    public function forgetPassword()
    {
        return view('auth.forgetPassword');
    }

    public function postForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login')->with('success', 'Password berhasil diubah.');
    }
}
