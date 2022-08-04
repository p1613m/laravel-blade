<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('home');
    }

    public function authForm()
    {
        return view('auth');
    }

    public function auth(AuthRequest $request)
    {
        $user = User::query()->where('email', $request->email)->first();

        if($user) {
            if(Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('home');
            }
        }

        return back()->withErrors(['email' => 'Login failed']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
