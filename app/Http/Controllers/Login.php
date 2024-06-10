<?php

namespace App\Http\Controllers;

use App\Models\mAllJaminan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Psy\debug;

class Login extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['status' => true, 'redirect' => '/dashboard']);
        } else {
            return response()->json(['status' => false, 'pesan' => 'Incorrect email or password', 'redirect' => '/login']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
