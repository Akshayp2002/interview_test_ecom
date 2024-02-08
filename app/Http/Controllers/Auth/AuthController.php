<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        try {
            return view('auth.login');
        } catch (Exception $e) {
        }
    }

    public function showRegistrationForm()
    {
        try {
            return view('auth.register');
        } catch (Exception $e) {
        }
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);
        try {
            if (Auth::attempt($credentials)) {
                if (Auth::user()->hasRole('Admin')) {
                    return \to_route('admin.dashboard');
                }
                return \to_route('user.dashboard');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (Exception $e) {
        }
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('User');
            Auth::login($user);

            return redirect()->route('user.dashboard');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Registration failed.'])->withInput();
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            Session::flush();
            return \to_route('login');
        } catch (Exception $e) {
        }
    }
}
