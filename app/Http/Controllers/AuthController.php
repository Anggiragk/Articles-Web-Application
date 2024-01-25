<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login',
            'active' => ''
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $login = $request->input('email');
        $user = Author::where('email', $login)->orWhere('username', $login)->first();

        if (!$user) {
            return redirect()->back()->with('loginFailed', 'Invalid login credentials');
        }
        $request->validate([
            'password' => 'required|min:5',
        ]);

        if (
            Auth::attempt(['email' => $user->email, 'password' => $request->password]) ||
            Auth::attempt(['username' => $user->username, 'password' => $request->password])
        ) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return back()->with('loginFailed', 'Invalid login credentials');
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => ''
        ]);
    }

    public function storeRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:10|unique:authors',
            'email' => 'required|email:dns|unique:authors',
            'password' => 'required|min:5|max:255'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        Author::create($validated);
        return redirect('/login')->with('success', 'Registration success please login');
    }
}
